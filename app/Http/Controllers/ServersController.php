<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

use App\Http\Requests;
use App\BaseServers;
use App\AssetStates;

use App\OperatingSystems;

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
     * @return \Illuminate\Http\Response
     */
         	
    public function display($id)
    {
    	
    	$data['servers'] = BaseServers::where('bareMetalId', $id)->get();
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
        // TODO:
        //
        // 1. get server racks from LSW api.
        // 2. Set it to the database through artisan commands.
        // 3. Weave them into the view.
        //
        // INFO: http://developer.leaseweb.com/paygbm-docs/#list-all-the-models-available-for-ordering

        $data["osList"]  = OperatingSystems::all();
        return view('servers.create', $data);
    }

    public function store()
    {
        // 1. fire request. -> end point '/payAsYouGo/bareMetals/instances';
        // 2. get the bare metal id out of the response.
        // 3. save id and his information throught the base server model.
        //
        // INFO: http://developer.leaseweb.com/paygbm-docs/#create-a-new-pay-as-you-go-instance
    }

}
