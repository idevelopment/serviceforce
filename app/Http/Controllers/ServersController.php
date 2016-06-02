<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\BaseServers;

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
    	return view('servers.index');
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
    	return view('servers.details', $data);
    }

    /**
     * Request a new server.
     *
     * @return \Illuminate\Http\Response
     */
            
    public function create()
    {        
        return view('servers.create');
    }

    public function store()
    {
        // 1. fire request. -> end point '/payAsYouGo/bareMetals/instances';
        // 2. get the bare metal id out of the response.
        // 3. save id and his information throught the base server model.
        // INFO: http://developer.leaseweb.com/paygbm-docs/#create-a-new-pay-as-you-go-instance
    }

}
