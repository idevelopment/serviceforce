<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class WebhostingController extends Controller
{
    /**
     * Plesk config variable
     *
     * @var array
     */
    protected $pleskConfig;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
		$this->middleware('lang');

        // Plesk config
        $this->pleskConfig['host']     = env('PLESK_HOST');
        $this->pleskConfig['username'] = env('PLESK_USER');
        $this->pleskConfig['password'] = env('PLESK_PASS');
    }

    /**
     * Show the webhosting search form.
     *
     * @url    GET|HEAD: /webhosting
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
    	return view('webhosting.GetSubscriptions');
    }

    /**
     * list webhosting accounts.
     *
     * @url    GET|HEAD: /webhosting/lookup
     * @return \Illuminate\Http\Response
     */
    public function listWebHostingAccounts()
    {
      	$request = new \pmill\Plesk\ListSubscriptions($this->pleskConfig);
    	$data["subscriptions"] = $request->process();

    	return view('webhosting/list', $data);
    }

    /**
     * Edit webhosting account.
     *
     * @url    GET|HEAD: /webhosting/manage/name
     * @param  int $id the id for the data record in the database about the webhosting account.     
     * @return \Illuminate\Http\Response
     */

    public function edit($name)
    {
    	$params = array(
    		'name'   => $name,
    		'domain' => $name,
    	 );

       	$request = new \pmill\Plesk\GetSubscription($this->pleskConfig, $params);
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
    	$params = array(
    		'domain_name'=>'example.com',
    		'username'=>'username',
    		'password'=>'password1!',
    		'ip_address'=>'',
    		'owner_id'=>0,
    		'service_plan_id'=>0,
    		);
    	$request = new \pmill\Plesk\CreateSubscription($this->pleskConfig, $params);
    	$info = $request->process();
    	var_dump($info);
    }
}
