<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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
    	return view('servers.list');
    }

    /**
     * Show the server overview.
     *
     * @return \Illuminate\Http\Response
     */
         	
    public function display()
    {
    	
    	$serverResource = '/bareMetals/202119';
    	$powerResource = '/bareMetals/202119/powerStatus'; 
    	$switchResource = '/bareMetals/202119/switchPort';
    	$ipResource = '/bareMetals/202119/ips';

    	$apiKey   = '';
    	$apiUrl   = 'https://api.leaseweb.com/v1';

    	// General server info
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $apiUrl . $serverResource);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Lsw-Auth: $apiKey"));
    	$output = curl_exec($ch);
    	$data["server"] = json_decode($output, true);
        

        $GetSwitchPort = curl_init();
        curl_setopt($GetSwitchPort, CURLOPT_URL, $apiUrl . $switchResource);
        curl_setopt($GetSwitchPort, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($GetSwitchPort, CURLOPT_HTTPHEADER, array("X-Lsw-Auth: $apiKey"));
        $SwitchPort = curl_exec($GetSwitchPort);
        $data["switch"] = json_decode($SwitchPort, true);

        // retrieve the power status
    	$GetPowerStatus = curl_init();
    	curl_setopt($GetPowerStatus, CURLOPT_URL, $apiUrl . $powerResource);
    	curl_setopt($GetPowerStatus, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($GetPowerStatus, CURLOPT_HTTPHEADER, array("X-Lsw-Auth: $apiKey"));
    	$power = curl_exec($GetPowerStatus);
     	$data["power"] = json_decode($power, true);

        // retrieve the assigned ips
    	$GetIps = curl_init();
    	curl_setopt($GetIps, CURLOPT_URL, $apiUrl . $ipResource);
    	curl_setopt($GetIps, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($GetIps, CURLOPT_HTTPHEADER, array("X-Lsw-Auth: $apiKey"));
    	$ipData = curl_exec($GetIps);
     	$data["ips"] = json_decode($ipData, true);     	

    	return view('servers.details', $data);
    }    

}
