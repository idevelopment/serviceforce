<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class CustomerStatusSeed
 */
class CustomerStatusSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'status'      => 'Active',
                'description' => 'The user is active',
                'background'  => 'success',
            ],
            [
                'status'      => 'Suspended',
                'description' => 'Suspended due billing or abuse issues.',
                'background'  => 'warning'
            ],
            [
                'status'      => 'Terminated',
                'description' => 'All services are terminated for this account',
                'background'  => 'danger'
            ]
        ];

        DB::table('service_statuses')->delete();
        CustomerStatusses::create($data);
    }
}
