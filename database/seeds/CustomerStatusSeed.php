<?php

use App\CustomerStatusses;
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
                'name'        => 'Active',
                'description' => 'The user is active',
                'background'  => 'success',
            ],
            [
                'name'        => 'Suspended',
                'description' => 'Suspended due billing or abuse issues.',
                'background'  => 'warning'
            ],
            [
                'name'        => 'Terminated',
                'description' => 'All services are terminated for this account',
                'background'  => 'danger'
            ]
        ];

        DB::table('service_statuses')->delete();
        DB::table('service_statuses')->insert($data);
    }
}
