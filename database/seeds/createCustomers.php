<?php

use Illuminate\Database\Seeder;
use App\Customers as Customers;
use Illuminate\Support\Facades\DB;

/**
 * Class createCustomers
 */
class createCustomers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
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
        );

        DB::table('customers')->delete();
        DB::table('customers')->insert($data);
    }
}
