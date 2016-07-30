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
    	$relations = ['sla', 'serverLocation', 'hostingPack', 'serverInfo', 'networkInfo'];
    	$data['server'] = BaseServers::with($relations)->find($id);
        $data["osList"] = OperatingSystems::all();
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
        $data["models"] = json_decode($body, true);


        $data["customers"]  = Customers::all();
        $data["users"]  = User::all();
        return view('servers.create', $data);

    }

    public function store(Request $request)
    {

        $resource = '/payAsYouGo/bareMetals/instances';
        $apiKey   = config('ServiceForge.leaseweb.apikey');
        $apiUrl   = 'https://api.leaseweb.com/v1';
        $data = array(
          "model" => $request->input("modelID")
        );
        $installData = array("osId" => $request->input("os"));

        // Request the new pay-as-you-go server;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl . $resource);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Lsw-Auth: $apiKey"));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        // Return the json response for the server provisioning.
        $json = json_decode($output, true);
        $bareMetalId = $json["bareMetalId"];

        $PayAsYouGo = new payAsYouGo;
        $PayAsYouGo->bareMetalId = $json["bareMetalId"];
        $PayAsYouGo->model = $json["model"];
        $PayAsYouGo->pricePerGb = $json["pricePerGb"];
        $PayAsYouGo->pricePerHour = $json["pricePerHour"];
        $PayAsYouGo->startedAt = $json["startedAt"];
        $PayAsYouGo->save();


        // Install the operating system on the server.
        if($output){
          $URLinstall = "/bareMetals/$bareMetalId/install";
          $install = curl_init();
          curl_setopt($install, CURLOPT_URL, $apiUrl . $URLinstall);
          curl_setopt($install, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($install, CURLOPT_POSTFIELDS, $installData);
          curl_setopt($install, CURLOPT_HTTPHEADER, array("X-Lsw-Auth: $apiKey"));
          curl_setopt($install, CURLOPT_POST, true );
          curl_setopt($install, CURLOPT_POSTFIELDS, $installData);
         $executeInstall = curl_exec($install);
        }
        session()->flash('message', 'Server provisioning has been started');
        return redirect()->back()->with('message', 'Server provisioning has been started');

        }

}
