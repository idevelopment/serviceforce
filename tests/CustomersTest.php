<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class CustomersTest
 */
class CustomersTest extends TestCase
{
    // DatabaseMigrations   - Migrate the database tables for the testing begins.
    // Databasetransactions - For running the queries against the database. 
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * GET: /customers
     * 
     * @group customers 
     * @group all 
     */
    public function testIndexUri()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->visit('/customers')
            ->seeStatusCode(200);
    }

    /**
     * GET: /cutsomers/display/{id}
     *
     * @group customers
     * @group all
     */
    public function testCustomerValidation()
    {
        $user     = factory(App\User::class)->create();
        $customer = factory(App\Customers::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->visit('/customers/display/' . $customer->id)
            ->seeStatusCode(200);
    }

    /**
     * POST: customers/register
     * - with validation errors.
     *
     * @group customers
     * @group all
     */
    public function testRegisterCustomerView()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->visit('/customers/register')
            ->seeStatusCode(200);
    }

    /**
     * GET: customers/register
     * - with validation errors.
     *
     * @group customers
     * @group all
     */
    public function testRegisterCustomerWithErrors()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->post('/customers/register', [])
            ->seeStatusCode(302)
            ->assertHasOldInput();
    } 

    /**
     * POST: customers/register
     * - without validation errors
     *
     * @group customers
     * @group all
     */
    public function testRegisterCustomerWithoutErrors()
    {
        $this->withoutMiddleware();
        $user  = factory(App\User::class)->create();

        // Input fields
        $input['company']   = 'Company';
        $input['fname']     = 'John';
        $input['name']      = 'Doe';
        $input['address']   = 'FooBar street';
        $input['zipcode']   = 2300;
        $input['city']      = 'BarCity';
        $input['country']   = 'Belguim';
        $input['phone']     = '0000 00 00 00';
        $input['mobile']    = 'test';
        $input['email']     = 'JhonDoe';
        $input['status_id'] =  1;
        $input['vat']       = 'vat number';

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->post('/customers/register', $input)
            ->seeInDatabase('customers', $input)
            ->seeStatusCode(302);
    }

    /**
     * GET: customer/suspend/{id}
     *
     * @group customers
     * @group all
     */
    public function testCustomerSuspend()
    {
        $data     = ['status_id' => 1];
        $user     = factory(App\User::class)->create();
        $customer = factory(App\Customers::class)->create($data);

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->seeInDatabase('customers', ['id' => $customer->id, 'status_id' => $customer->status_id])
            ->visit('/customers/suspend/' . $customer->id)
            ->dontSeeInDatabase('customers', ['id' => $customer->id, 'status_id' => $customer->status_id])
            ->seeInDatabase('customers', ['id' => $customer->id, 'status_id' => 2])
            ->seeStatusCode(200);
    }

    /**
     * GET: /customers/active/{id}
     *
     * @group customers
     * @group all
     */
    public function testCustomerActive()
    {
        $data     = ['status_id' => 2];
        $user     = factory(App\User::class)->create();
        $customer = factory(App\Customers::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->seeInDatabase('customers', ['email' => $customer->email, 'status_id' => $customer->status_id])
            ->visit('/customers/active/' . $customer->id)
            ->dontSeeInDatabase('customers', ['id' => $customer->id, 'status_id' => $customer->status_id])
            ->seeInDatabase('customers', ['id' => $customer->id, 'status_id' => 1])
            ->seeStatusCode(200);
    }

    /**
     * GET: /customers/delete/{id}
     *
     * @group customers
     * @group all
     */
    public function customerDelete()
    {
        $user     = factory(App\User::class)->create(); 
        $customer = factory(App\Customers::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->seeInDatabase('customers', ['id' => $customer->id, 'deleted_at' => ''])
            ->visit('/customers/delete/' . $customer->id)
            ->dontSeeInDatabase('customers', ['id' => $customer->id, 'deleted_at' => ''])
            ->seeStatusCode(302);
    }
}
