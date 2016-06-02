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

}
