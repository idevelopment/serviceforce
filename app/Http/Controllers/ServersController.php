<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      // Get all OperatingSystems from the LSW api.
        $OSpath     = config('ServiceForge.leaseweb.urls.os');
        $OSclient   = new \GuzzleHttp\Client();
        $OSresponse = $OSclient->get($OSpath, ['headers' => ['X-Lsw-Auth' => config('ServiceForge.leaseweb.apikey')]]);
        $OSbody = $OSresponse->getbody();
        $OSbody->getContents();
        $data["osList"] = json_decode($OSbody, true);
        $data["states"] = AssetStates::all();

    	return view('servers.index', $data);
    }

    /**
     * Show the servers list.
     *
     * @return \Illuminate\Http\Response
     */

    public function getServers()
    {
        $data["servers"] = BaseServers::all();
    	return view('servers.list', $data);
    }

    /**
     * Show the server overview.
     *
     * @param  int $id the id for the data record in the database about the server.
     * @return \Illuminate\Http\Response
     */

    public function display($id)
    {
      // Get all OperatingSystems from the LSW api.
        $OSpath     = config('ServiceForge.leaseweb.urls.os');
        $OSclient   = new \GuzzleHttp\Client();
        $OSresponse = $OSclient->get($OSpath, ['headers' => ['X-Lsw-Auth' => config('ServiceForge.leaseweb.apikey')]]);
        $OSbody = $OSresponse->getbody();
        $OSbody->getContents();
        $data["OperatingSystems"] = json_decode($OSbody, true);

    	$relations = ['sla', 'serverLocation', 'hostingPack', 'serverInfo', 'networkInfo'];
    	$data['server'] = BaseServers::with($relations)->find($id);
    	return view('servers.details', $data);
    }

    /**
     * Create server view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
      // Get all OperatingSystems from the LSW api.
        $OSpath     = config('ServiceForge.leaseweb.urls.os');
        $OSclient   = new \GuzzleHttp\Client();
        $OSresponse = $OSclient->get($OSpath, ['headers' => ['X-Lsw-Auth' => config('ServiceForge.leaseweb.apikey')]]);
        $OSbody = $OSresponse->getbody();
        $OSbody->getContents();
        $data["OperatingSystems"] = json_decode($OSbody, true);

        // Get all available payasyougoModels from the LSW api.
        $path     = config('ServiceForge.leaseweb.urls.payasyougoModels');
        $client   = new \GuzzleHttp\Client();
        $response = $client->get($path, ['headers' => ['X-Lsw-Auth' => config('ServiceForge.leaseweb.apikey')]]);
        $body = $response->getbody();
        $body->getContents();
        $models  = json_decode($body, true);

        $data["models"] = array_filter($models);
        $data["customers"]  = Customers::all();
        $data["users"]  = User::all();
        return view('servers.create', $data);

    }

    public function store(Request $request)
    {
      $apiUrl   = 'https://api.leaseweb.com/v1';

      $apiKey   = config('ServiceForge.leaseweb.apikey');
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
        $PayAsYouGo->status = "new";

        $PayAsYouGo->save();


        $data["PayAsYouGo"] = $PayAsYouGo;
        Mail::send('emails.serverRequest', $data, function ($message) {
          $message->from('provisioning@idevelopment.be', 'iDevelopment Provisioning');
          $message->to('sales@idevelopment.be');
        });
        return redirect()->back()->with('message', 'Server provisioning has been started');

        }

    public function deleteServerQ($id)
     {
       PayAsYouGo::destroy($id);
       return redirect("home");
     }
}
