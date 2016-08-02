<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class WebhostingController extends Controller
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
     * Show the webhosting search form.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
    	return view('webhosting.GetSubscriptions');
    }

    /**
     * list webhosting accounts.
     *
     * @return \Illuminate\Http\Response
     */
    public function listWebHostingAccounts()
    {
    	$pleskConfig = [
    		'host'     => env('PLESK_HOST'),
    		'username' => env('PLESK_USER'),
    		'password' => env('PLESK_PASS'),
		];
    
      	$request = new \pmill\Plesk\ListSubscriptions($pleskConfig);
    	$data["subscriptions"] = $request->process();

    	return view('webhosting/list', $data);
    }

    /**
     * Edit webhosting account.
     *
     * @param  int $id the id for the data record in the database about the webhosting account.     
     * @return \Illuminate\Http\Response
     */

    public function edit($name)
    {
    	$pleskConfig = array(
    		'host'     => env('PLESK_HOST'),
    		'username' => env('PLESK_USER'),
    		'password' => env('PLESK_PASS'),
    		);

    	$params = array(
    		'name'   => $name,
    		'domain' => $name,
    	 );

       	$request = new \pmill\Plesk\GetSubscription($pleskConfig, $params);
       	$mailbox = new \pmill\Plesk\ListEmailAddresses($pleskConfig, $params);
   
    	$data["subscription"] = $request->process();
       	$data["Mailbox"] = $mailbox->process();
    	return view('webhosting/manage', $data);

    }

    /**
     * Create webhosting subscription.
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
    	$pleskConfig = array(
    		'host'     => env('PLESK_HOST'),
    		'username' => env('PLESK_USER'),
    		'password' => env('PLESK_PASS'),
    		);

    	$params = array(
    		'domain_name'=>'example.com',
    		'username'=>'username',
    		'password'=>'password1!',
    		'ip_address'=>'',
    		'owner_id'=>0,
    		'service_plan_id'=>0,
    		);
    	$request = new \pmill\Plesk\CreateSubscription($pleskConfig, $params);
    	$info = $request->process();
    	var_dump($info);
    }
}
