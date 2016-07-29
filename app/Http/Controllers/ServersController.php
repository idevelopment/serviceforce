<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

use App\Http\Requests;
use App\BaseServers;
use App\AssetStates;

use App\OperatingSystems;
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
        $data["osList"] = OperatingSystems::all();
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

        $path     = config('ServiceForge.leaseweb.urls.payasyougoModels');
        $client   = new \GuzzleHttp\Client();
        $response = $client->get($path, ['headers' => ['X-Lsw-Auth' => config('ServiceForge.leaseweb.apikey')]]);
        $body = $response->getbody();
        $body->getContents();
        $data["models"] = json_decode($body, true);


        $data["osList"]  = OperatingSystems::all();
        $data["customers"]  = Customers::all();
        $data["users"]  = User::all();
        return view('servers.create', $data);

    }

    public function store()
    {
        // 1. fire request. -> end point '/payAsYouGo/bareMetals/instances';
        // 2. get the bare metal id out of the response.
        // 3. save id and his information throught the base server model.
        //
        // INFO: http://developer.leaseweb.com/paygbm-docs/#create-a-new-pay-as-you-go-instance

     $path     = config('ServiceForge.leaseweb.urls.payasyougo');
     $headers  = ['X-Lsw-Auth' => config('ServiceForge.leaseweb.apikey')];
     $serverID = '1112721';
     $options = [
         'debug' => true,
         'headers' => ['X-Lsw-Auth' => config('ServiceForge.leaseweb.apikey')],
         'form_params' => [
         'model' => $serverID,
         ],
     ];

     $client   = new \GuzzleHttp\Client();
     $response = $client->post($path, $options);
     var_dump($response);
      }

}
