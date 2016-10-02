<?php

namespace App\Http\Controllers;

use App\Countries;
use App\Jobs\MailNewCustomer;
use App\Jobs\SuiteCrmDelete;
use App\Jobs\SuiteCrmInsert;
use App\Jobs\SuiteCrmUpdate;
use App\Logs;
use App\Traits\LoggerTrait;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Customers;

/**
 * Class CustomersController
 * @package App\Http\Controllers
 */
class CustomersController extends Controller
{
    use LoggerTrait;

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
     * @url    GET|HEAD: /customers
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['customers'] = Customers::paginate(15);
        return view('customers/index', $data);
    }

    /**
     * Suspend a customer.
     *
     * @url    GET|HEAD: customers/suspend/{id}
     * @param  int $id the customer id.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function SuspendCustomer($id)
    {
        // TODO: Set the update query.
        // 2 = db id suspended. 
        $customer = Customers::find($id);
        $customer->status()->associate(2);
        $customer->save();

        session()->flash('message', 'Customer is suspended');
        return redirect()->route('customers.index');
    }

    /**
     * Activate a customer.
     *
     * @url    GET|HEAD /customers/active/{id}
     * @param  int $id the customer id.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function ActivateCustomer($id)
    {
        $customer = Customers::find($id);
        $customer->status()->associate(1);
        $customer->save();

        $this->LogInfo('Account is suspended activated.', $customer);
        session()->flash('message', 'Customer is activated');
        return redirect()->route('customers.index');
    }

    /**
     * The customer index view.
     *
     * @url    GET|HEAD /customers/display/{id}
     * @param  int $id The customer id in the database.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data['customer'] = Customers::where('id', $id)->get();
        $data['logs']     = Logs::where('Customer_id', $id)->get();

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
        /** @var array $input the input fields out off the forms */
        $this->dispatch(new CrmUpdate($input->except('_token')));
        Customers::find($id)->update($input->except('_token'));
        session()->flash('message', 'Costumer updated.');
        return redirect()->back(302);
    }

    /**
     * Register a new customer.
     *
     * @url    GET|HEAD: /customers/register
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
     * @url    POST: customers/register
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
        //
        // INFO: http://apidocs.sugarcrm.com/schema/6.5.23/ce/tables/accounts.html

        $data     = $input->all();
        $customer = Customers::create($data)->id;

        $this->dispatch(new CrmInsert($input->all()));
        $this->dispatch(new MailNewCustomer($data));
        $this->LogInfo('Customer has been registrered to the platform', $customer);

        session()->flash('message', 'The user has been created');
        return redirect()->back(302);
    }

    /**
     * Soft delete a customer in the application.
     *
     * @url    GET|HEAD /customers/delete/{id}
     * @param  int $id the customer id in the database
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Customers::find($id)->delete();
        $this->dispatch(new CrmDelete($id));

        session()->flash('message', 'The user has been deleted.');
        return redirect()->back(302);
    }
}
