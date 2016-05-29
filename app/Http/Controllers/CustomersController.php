<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Customers;

/**
 * Class CustomersController
 * @package App\Http\Controllers
 *
 * TODO: needs phpunit tests.
 */
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

    public function edit($id)
    {
        return view('customers.edit')
    }

    /**
     * Stroe a new customer to the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        return redirect()->back(302);
    }

    /**
     * Create a new customer.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Update a specific customer,
     *
     * @param  int $id the customer id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        return redirect()->back(302);
    }

    /**
     * Soft delete a user in the database.
     *
     * @param  int $id the customer id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // TODO: Implement soft delete on the database.
        return redirect()->back(302);
    }
}
