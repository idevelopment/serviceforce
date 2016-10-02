<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\PayAsYouGo;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('lang');
    }

    /**
     * Show the application dashboard.
     *
     * @url    GET|HEAD; /home
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data["count"] = PayAsYouGo::all()->count();
      $data["PayAsYouGo"] = PayAsYouGo::all();
      return view('home', $data);
    }
}
