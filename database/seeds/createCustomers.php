<?php

use Illuminate\Database\Seeder;
use App\Customers as Customers;
class createCustomers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             Customers::create(array(
        	'company' =>  'iDevelopment',
        	'fname' => 'Demo',
            'name' => 'Customer',
            'address' => 'Foobar street 4',
            'zipcode' => '3800',
            'city' => 'Sint-Truiden',
            'country' => 'Belgium',
            'email' => 'admin@ringme.eu',
            'phone' => '0',
            'mobile' => '0',
        ));
    }
}
