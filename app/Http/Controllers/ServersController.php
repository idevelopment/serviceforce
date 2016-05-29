<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ServersController extends Controller
{

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
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
    	return view('servers.list');
    }

    /**
     * Show the server overview.
     *
     * @return \Illuminate\Http\Response
     */
         	
    public function display()
    {
    	return view('servers.details');
    }    

}
