<?php

namespace App\Http\Controllers;

use App\Countries;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Customers;

/**
 * Class CustomersController
 * @package App\Http\Controllers
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

    /**
     * The customer index view.
     *
     * @param  int $id The customer id in the database.
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
        $data['countries'] = Countries::all();
        return view('customers.create', $data);
    }

    /**
     * Store a new costumer in the database.
     *
     * @param  Requests\CostumerValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Requests\CostumerValidator $input)
    {
        // TODO: Function steps.
        //
        // 1. Load customers data from Suitecrm and save it to serviceforce #43
        // 2. Set the customer status to new because we don't have any services assigned to this customer.
        // 3. Send notification to support@idevelopment.be that the user has been created and ready for services assignment.
        // 4. Let the user know that the user is saved -> flash session.
        //
        // INFO: http://apidocs.sugarcrm.com/schema/6.5.23/ce/tables/accounts.html

        return redirect()->back(302);
    }

    /**
     * Soft delete a customer in the application.
     * 
     * @param  int $id the customer id in the database
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Customers::find($id)->delete();
        return redirect()->back(302);
    }
}
