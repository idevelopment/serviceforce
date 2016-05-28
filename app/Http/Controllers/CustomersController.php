<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Customers;

class CustomersController extends Controller
{
    /**
     * CustomersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * The customer index view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['customers'] = Customers::paginate(15);
        return view('customers/index', $data);
    }

}
