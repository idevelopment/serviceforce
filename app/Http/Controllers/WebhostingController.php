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
			$config = array(
				'host'     => env('PLESK_HOST'),
				'username' => env('PLESK_USER'),
				'password' => env('PLESK_PASS'),
				);

				$request = new \pmill\Plesk\ListSubscriptions($config);
	    	$data["subscriptions"] = $request->process();

			$getip = new \pmill\Plesk\ListIPAddresses($config);
			$data["ipList"] = $getip->process();

    	return view('webhosting.GetSubscriptions', $data);
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

    public function edit($id)
    {
    	$pleskConfig = array(
    		'host'     => env('PLESK_HOST'),
    		'username' => env('PLESK_USER'),
    		'password' => env('PLESK_PASS'),
    		);

    	$params = array(
    		'subscription_id'   => $id,
    	 );

      $request = new \pmill\Plesk\GetSubscription($pleskConfig, $params);
  //

    	$items = $request->process();

			foreach($items as $web)
			{

				// $domain =
				$params = array('domain'=> $web["name"]);

				$requestDNS = new \pmill\Plesk\ListDNSRecords($pleskConfig, $params);
				$dns = $requestDNS->process();

				$requestMAIL = new \pmill\Plesk\ListEmailAddresses($pleskConfig, $params);
				$mail = $requestMAIL->process();
			}



    //  $data["Mailbox"] = $mailbox->process();

		$data["item"] = $items;
		$data["mail"] = $mail;
		$data["dns"]  =  $dns;

    	return view('webhosting/manage', $data);

    }

    /**
     * Create webhosting subscription.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function save(Request $request)
    {
			$config = array(
    		'host'     => env('PLESK_HOST'),
    		'username' => env('PLESK_USER'),
    		'password' => env('PLESK_PASS'),
    		);

				$params = array(
				  'domain_name'=>'example.com',
				  'username'=> $request->username,
					'password'=>'password1!',
					'ip_address'=> $request->ip,
					'owner_id'=>0,
					'service_plan_id'=>0,
				);

				$request = new \pmill\Plesk\CreateSubscription($config, $params);
				$info = $request->process();
				var_dump($info);
    }
}
