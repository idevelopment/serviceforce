<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class IPMController
 * @package App\Http\Controllers
 */
class IPMController extends Controller
{
    /**
     * CustomersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('lang');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $resource = '/ips';
        $apiKey = config('ServiceForge.leaseweb.apikey');
        $apiUrl = 'https://api.leaseweb.com/v1';

        $queryIp = curl_init();
        curl_setopt($queryIp, CURLOPT_URL, $apiUrl . $resource);
        curl_setopt($queryIp, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($queryIp, CURLOPT_HTTPHEADER, array("X-Lsw-Auth: $apiKey"));
        $output = curl_exec($queryIp);

        $data["output"] = json_decode($output);

        return view('ips.index', $data);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function whois($id)
    {
        $data["lookup"] = $id;
        return view("ips/whois", $data);
    }
}
