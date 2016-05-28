<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CustomersController extends Controller
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
     * The customer index view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['customers'] = Customer::paginate(15);
        return view('customers/index', $data);
    }

}
