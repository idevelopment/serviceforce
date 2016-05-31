<?php

use App\ServiceStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class ServiceStatusSeed
 */
class ServiceStatusSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_statuses')->delete();

        ServiceStatus::create([
            'name'        => 'Running',
            'description' => 'Service is running',
            'background'  => '',
            'bgcolor'     => '#ff',
        ]);

        ServiceStatus::create([
            'name'        => 'Provisioning',
            'description' => 'Service is currently being provisioned',
            'background'  => 'info',
            'bgcolor'     => '#fff'
        ]);

        ServiceStatus::create([
            'name'        => 'Provisioned',
            'description' => 'Service is provisioned',
            'background'  => 'success',
            'bgcolor'     => '#fff'
        ]);

        ServiceStatus::create([
            'name'        => 'Cancelled',
            'description' => 'Service is cancelled',
            'background'  => 'danger',
            'bgcolor'     => '#fff'
        ]);

        ServiceStatus::create([
            'name'        => 'Suspended',
            'description' => 'Service is suspended',
            'background'  => 'warning',
            'bgcolor'     => '#fff'
        ]);
    }
}
