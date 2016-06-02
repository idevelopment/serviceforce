<?php

use App\AssetStates;
use Illuminate\Database\Seeder;

class AssetStatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table->string('Status');
        $table->string('State_Label');
        $table->string('State_Name');
        $table->text('Description');

        $data = [
            [
                'Status'      => 'Any',
                'State_Label' => 'Failed',
                'State_Name'  => 'Failed',
                'Description' => 'A service in this state has encountered a problem and may not be operational. It cannot be started nor stopped.'
            ],
            [
                'Status'      => 'Any',
                'State_Label' => 'New',
                'State_Name'  => 'New',
                'Description' => 'A service in this state is inactive. It does minimal work and consumes minimal resources.'
            ],
            [
                'Status'      => 'Any',
                'State_Label' => 'Running',
                'State_Name'  => 'Running',
                'Description' => 'A service in this state is operational.'
            ],
            [
                'Status'      => 'Any',
                'State_Label' => 'Starting',
                'State_Name'  => 'Starting',
                'Description' => 'A service in this state is transitioning to Running'
            ],
            [
                'Status'      => 'Any',
                'State_Label' => 'Stopping',
                'State_Name'  => 'Stopping',
                'Description' => 'A service in this state is transitioning to Terminated.'
            ],
            [
                'Status'      => 'Any',
                'State_Label' => 'terminated',
                'State_Name'  => 'Terminated',
                'Description' => 'A service in thus state has completed execution normally. it does minimal work and consumes minimal resources.'
            ],
            [
                'Status'      => 'Maintenance',
                'State_Label' => 'Hardware problem',
                'State_Name'  => 'Hardware problem',
                'Description' => 'An asset is experiencing a non-IPMI issue and needs to be examined. It need investigation.'
            ],
            [
                'Status'      => 'Maintenance',
                'State_Label' => 'Hardware Testing',
                'State_Name'  => 'Hardware Testing',
                'Description' => 'Performing some testing that requires putting the asset into a maintenance state.'
            ],
            [
                'Status'      => 'Maintenance',
                'State_Label' => 'Hardware Upgrade',
                'State_Name'  => 'Hardware Upgrade',
                'Description' => 'An asset is in need or process of having hardware upgraded.'
            ],
            [
                'Status'      => 'Maintenance',
                'State_Label' => 'IPMI Problem',
                'State_Name'  => 'IPMI Problem',
                'Description' => 'An asset is experience IPMI issues and needs to be examined. It needs investigation.'
            ],
            [
                'Status'      => 'Maintenance',
                'State_Label' => 'Maintenance NOOP',
                'State_Name'  => 'Maintenance NOOP',
                'Description' => 'Doing nothing, bouncing this through maintenance for my selfish reasons.'
            ],
            [
                'Status'      => 'Maintenance',
                'State_Label' => 'Network problem',
                'State_Name'  => 'Network problem',
                'Description' => 'An asset is experience a network problem that may or not be hardware related. It needs investigation.'
            ],
            [
                'Status'      => 'Maintenance',
                'State_Label' => 'Relocation',
                'State_Name'  => 'Relocation',
                'Description' => 'An asset is being physically relocated?'
            ],
        ];

        DB::table('asset_states')->delete();
        AssetStates::create($data);
    }
}
