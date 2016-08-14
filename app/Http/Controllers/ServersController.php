<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

use App\Http\Requests;
use App\BaseServers;
use App\AssetStates;

use App\PayAsYouGo;
use App\Customers;
use App\User;
use Mail;

class ServersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('lang');
    }

    /**
     * Show the servers search form.
     *
     * @url    GET|HEAD: /servers
     * @url    GET|HEAD: /servers/lookup
     * @url    GET|HEAD: servers/queue
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all OperatingSystems from the LSW api.
        $OSpath = config('ServiceForge.leaseweb.urls.os');
        $OSclient = new \GuzzleHttp\Client();
        $OSresponse = $OSclient->get($OSpath, ['headers' => ['X-Lsw-Auth' => config('ServiceForge.leaseweb.apikey')]]);
        $OSbody = $OSresponse->getbody();
        $OSbody->getContents();
        $data["osList"] = json_decode($OSbody, true);
        $data["states"] = AssetStates::all();

        $data["Qcount"] = PayAsYouGo::where('status', 'new')->count();
        $data["PayAsYouGo"] = PayAsYouGo::all();

        return view('servers.index', $data);
    }

    /**
     * Show the servers list.
     *
     * @return \Illuminate\Http\Responsed
     */
    public function getServers()
    {
        $data["servers"] = BaseServers::all();
        return view('servers/index', $data);
    }

    /**
     * Show the server overview.
     *
     * @url    GET|HEAD; /servers/display/{id}
     * @param  int $id the id for the data record in the database about the server.
     * @return \Illuminate\Http\Response
     */
    public function display($id)
    {
        $apiUrl = env('LEASEWEB_URL');
        $apiKey = config('ServiceForge.leaseweb.apikey');
        // Get all OperatingSystems from the LSW api.
        $OSpath = config('ServiceForge.leaseweb.urls.os');
        $OSclient = new \GuzzleHttp\Client();
        $OSresponse = $OSclient->get($OSpath, ['headers' => ['X-Lsw-Auth' => config('ServiceForge.leaseweb.apikey')]]);
        $OSbody = $OSresponse->getbody();
        $OSbody->getContents();
        $data["OperatingSystems"] = json_decode($OSbody, true);

        // retrieve the status of the switch port connected to this server.
        $PowerResource = "/bareMetals/$id/powerStatus";
        $checkPower = curl_init();
        curl_setopt($checkPower, CURLOPT_URL, $apiUrl . $PowerResource);
        curl_setopt($checkPower, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($checkPower, CURLOPT_HTTPHEADER, array("X-Lsw-Auth: $apiKey"));
        $PowerOutput = curl_exec($checkPower);
        $PowerData = json_decode($PowerOutput, true);

        // retrieve a list of all IPs that are assigned to this server.
        $IPresource = "/bareMetals/$id/ips";
        $queryIp = curl_init();
        curl_setopt($queryIp, CURLOPT_URL, $apiUrl . $IPresource);
        curl_setopt($queryIp, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($queryIp, CURLOPT_HTTPHEADER, array("X-Lsw-Auth: $apiKey"));
        $IPoutput = curl_exec($queryIp);

        $data["IPoutput"] = json_decode($IPoutput);

        $relations = ['sla', 'serverLocation', 'hostingPack', 'serverInfo', 'networkInfo'];
        $data['server'] = BaseServers::with($relations)->where('bareMetalId', '=', $id)->first();
        return view('servers.details', $data);
        //  $server = BaseServers::with($relations)->where('bareMetalId','=', $id);

    }

    /**
     * Create server view.
     *
     * @url    GET|HEAD: /servers/create
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // Get all OperatingSystems from the LSW api.
        $OSpath = config('ServiceForge.leaseweb.urls.os');
        $OSclient = new \GuzzleHttp\Client();
        $OSresponse = $OSclient->get($OSpath, ['headers' => ['X-Lsw-Auth' => config('ServiceForge.leaseweb.apikey')]]);
        $OSbody = $OSresponse->getbody();
        $OSbody->getContents();
        $data["OperatingSystems"] = json_decode($OSbody, true);

        // Get all available payasyougoModels from the LSW api.
        $path = config('ServiceForge.leaseweb.urls.payasyougoModels');
        $client = new \GuzzleHttp\Client();
        $response = $client->get($path, ['headers' => ['X-Lsw-Auth' => config('ServiceForge.leaseweb.apikey')]]);
        $body = $response->getbody();
        $body->getContents();
        $models = json_decode($body, true);

        $data["models"] = array_filter($models);
        $data["customers"] = Customers::all();
        $data["users"] = User::all();
        return view('servers.create', $data);

    }

    /**
     * Add a new server.
     *
     * @url    POST: servers/create
     * @param  Requests\ServerCreateValidator $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Requests\ServerCreateValidator $request)
    {
        $apiUrl = env('LEASEWEB_URL');
        $apiKey = config('ServiceForge.leaseweb.apikey');
        $osId = $request->input("os");


        $modelId = $request->input('modelID');
        //  retrieve the Operating Systems resource
        $OSresource = "/operatingSystems/$osId";

        $checkOS = curl_init();
        curl_setopt($checkOS, CURLOPT_URL, $apiUrl . $OSresource);
        curl_setopt($checkOS, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($checkOS, CURLOPT_HTTPHEADER, array("X-Lsw-Auth: $apiKey"));
        $osOutput = curl_exec($checkOS);
        $OperatingSystemData = json_decode($osOutput, true);

        // Get data for the requested model
        $modelResource = "/payAsYouGo/bareMetals/models/$modelId";
        $checkModel = curl_init();
        curl_setopt($checkModel, CURLOPT_URL, $apiUrl . $modelResource);
        curl_setopt($checkModel, CURLOPT_RETURNTRANSFER, 1);
        $modelOutput = curl_exec($checkModel);
        $modelData = json_decode($modelOutput, true);


        // Save the new server to the database.
        $PayAsYouGo = new payAsYouGo;
        $PayAsYouGo->model = $request->input("modelID");
        $PayAsYouGo->modelLabel = $modelData["case"];
        $PayAsYouGo->osId = $request->input("os");
        $PayAsYouGo->osLabel = $OperatingSystemData["operatingSystem"]["name"];
        $PayAsYouGo->pool = $request->input("serverPool");
        $PayAsYouGo->status = "New";

        $PayAsYouGo->save();
        $data["PayAsYouGo"] = $PayAsYouGo;

        Mail::send('emails.serverRequest', $data, function ($message) {
            $message->from('provisioning@idevelopment.be', 'iDevelopment Provisioning');
            $message->to('sales@idevelopment.be');
        });
        return redirect("servers/queue")->with('success', 'The server provisioning will start in a minute');
    }

    /**
     * Reinstall a server
     *
     * @url    POST: /servers/reinstall
     * @param  Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Reinstall(Request $request)
    {

        $bareMetalId = $request->input("serverId");
        $installData = array("osId" => $request->input("OperatingSystem"));

        $apiUrl = env('LEASEWEB_URL');
        $URLinstall = "/bareMetals/$bareMetalId/install";
        $apiKey = config('ServiceForge.leaseweb.apikey');

        $install = curl_init();
        curl_setopt($install, CURLOPT_URL, $apiUrl . $URLinstall);
        curl_setopt($install, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($install, CURLOPT_POSTFIELDS, $installData);
        curl_setopt($install, CURLOPT_HTTPHEADER, array("X-Lsw-Auth: $apiKey"));
        curl_setopt($install, CURLOPT_POST, true);
        curl_setopt($install, CURLOPT_POSTFIELDS, $installData);
        $response = curl_exec($install);

        $err = curl_error($install);
        curl_close($install);

        if ($err) {
            return redirect("servers/display/$bareMetalId")->with('error', "Installation error:" . $err);
        } else {
            BaseServers::where('bareMetalId', $serverId)->update(['serverStatus' => 'Maintenance', 'serverState' => 'Running']);
            return redirect("servers/display/$bareMetalId")->with('success', $response);
        }
    }

    /**
     * Selete a server.
     *
     * @url   GET|HEAD: servers/remove/{id}
     * @param int $id
     */
    public function deleteServer($id)
    {
        $apiUrl = env('LEASEWEB_URL');
        $apiKey = config('ServiceForge.leaseweb.apikey');
        $modelResource = "/instances/$id/destroy";

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "$apiUrl . $modelResource",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "post",
            CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)',
            CURLOPT_HTTPHEADER => array("x-lsw-auth:$apiKey"),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
            BaseServers::where('bareMetalId', '=', '".$id."')->forceDelete();
            PayAsYouGo::where('bareMetalId', '=', '".$id."')->forceDelete();

        }

        //   return redirect("servers/lookup");
    }

    /**
     * Delete server out off queue
     *
     * @url    GET|HEAD: servers/removeq/{id}
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteServerQ($id)
    {
        $exist = PayAsYouGo::where('id', '=', '".$id."')->where('status', '=', 'provisioning')->count();
        if ($exist === 0) {
            PayAsYouGo::destroy($id);
            return redirect("servers/queue")->with('success', 'The server request has been canceled');
        } else {
            return redirect("servers/queue")->with('warning', 'It is not possible to cancel this order because the server provisioning already has been started');
        }
    }
}
