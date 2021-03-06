<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(createCustomers::class);
        $this->call(ServiceStatusSeed::class);
        $this->call(AssetStatesSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CustomerStatusSeed::class);
        factory(App\BaseServers::class)->create();
    }
}
