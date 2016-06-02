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
        $this->middleware('lang');
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

    /**
     * The customer index view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data['customer'] = Customers::where('id', $id)->get();
        return view('customers/manage', $data);
    }

    /**
     * Update a user in the database.
     *
     * @param  Requests\CostumerValidator $input
     * @param  int $id the customer id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Requests\CostumerValidator $input, $id)
    {
        Customers::find($id)->update($input->except('_token'));
        session()->flash('message', 'Costumer updated.');
        return redirect()->back(302);
    }

    /**
     * Register a new customer.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        return view('customers.create');
    }

    /**
     * Store a new costumer in the database.
     *
     * @param  Requests\CostumerValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Requests\CostumerValidator $input)
    {
        return redirect()->back(302);
    }
}
