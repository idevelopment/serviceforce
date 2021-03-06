<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
$factory->define(App\Customers::class, function (Faker\Generator $faker) {
    return [
        'company'   => 'Company name', 
        'fname'     => 'Jhon', 
        'name'      => 'Doe',
        'address'   => 'FooBar street', 
        'zipcode'   => 2300, 
        'city'      => 'Turnhout', 
        'country'   => 'Belguim',
        'phone'     => 'test',
        'mobile'    => 'test',
        'email'     => 'jhondoe@example.tld',
        'status_id' => 0,
        'vat'       => 'var number'
    ];
});

$factory->define(App\ServiceStatus::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->name,
        'description' => 'description',
        'bgcolor'     => '#FF0000',
        'background'  => 'alert'
    ];
});

$factory->define(App\AssetStates::class, function (Faker\Generator $faker) {
    return [
        'Status'      => 'status',
        'State_Label' => 'status label',
        'State_Name'  => 'status name',
        'Description' => 'description'
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Countries::class, function(Faker\Generator $faker) {
    return [ 'name' => $faker->country ];
});

$factory->define(App\Sla::class, function(Faker\Generator $faker) {
    return [
        'slaName'       => $faker->name,
        'pricePerMonth' => $faker->currencyCode
    ];
});

$factory->define(App\serverHostingPack::class, function(Faker\Generator $faker) {
    return [
        'reference'    => 'reference',
        'bareMetalId'  => $faker->numberBetween(0, 250),
        'serverName'   => 'Server name',
        'serverType'   => 'Bare Metal',
        'startDate'    => $faker->time(),
        'endDate'      => $faker->time(),
        'contractTerm' => '1 Year'
    ];
});

$factory->define(App\CustomerStatusses::class, function(Faker\Generator $faker) {
    return [
        'status'      => 'Active',
        'description' => 'The user is active',
        'background'  => 'success',
    ];
});

$factory->define(App\Server::class, function(Faker\Generator $faker) {
    return [
        'ram'            => '8GB',
        'kvm'            => 'yes',
        'serverType'     => 'Bare Metal',
        'processorType'  => 'I7',
        'processorSpeed' => '3.3Ghz',
        'numberOfCpus'   => 4,
        'numberOfCores'  => 8,
        'hardDisks'      => 16,
        'hardwareRaid'   => 'RAID 4'
    ];
});

$factory->define(App\ServerLocation::class, function(Faker\Generator $faker) {
    return [
        'Site'            => $faker->address,
        'Cabinet'         => $faker->numberBetween(0, 250),
        'Rackspace'       => $faker->numberBetween(0, 250),
        'CombinationLock' => '123456'
    ];
});

$factory->define(App\BaseServers::class, function(Faker\Generator $faker) {
    return [
        'bareMetalId'             => $faker->numberBetween(0, 250),
        'serverName'              => $faker->name,
        'serverType'              => 'Bare Metal',
        'serverState'             => 'New',
        'serverStatus'            => 'New',
        'reference'               => $faker->text(200),

        // Relations
        'ServerLocation_id'       => function () {
            return factory(App\ServerLocation::class)->create()->id;
        },
        'Server_id'               => function() {
            return factory(App\Server::class)->create()->id;
        },
        'serverHostingPack'       => function() {
            return factory(App\serverHostingPack::class)->create()->id;
        },
        'network_informations_id' => function () {
            return factory(App\NetworkInformation::class)->create()->id;
        },
        'sla_id'                  => function () {
            return factory(App\Sla::class)->create()->id;
        },
    ];
});

$factory->define(App\InstanceServers::class, function (Faker\Generator $faker) {
    return [
        'bareMetalId'         => '011',
        'model_id'            => '0544',
        'LWS_customer_number' => '57654',
        'pricePerHour'        => '0.50',
        'pricePerHour'        => '1.00',
        'startedAt'           => new DateTime,
        'destroyedAt'         => new DateTime,
    ];
});

$factory->define(App\NetworkInformation::class, function(Faker\Generator $faker) {
    return [
        'dataPack'        => $faker->name,
        'ipsFreeOfCharge' => $faker->numberBetween(0, 3),
        'ipsAssigned'     => $faker->numberBetween(0, 3),
        'excessIpsPrice'  => '4',
        'DataPackExcess_id' => function () {
            return factory(App\DataPackExcess::class)->create()->id;
        },
        'macAddresses'    => $faker->ipv4,
        'pricePerMonth'   => '2,48',
    ];
});

$factory->define(App\OperatingSystems::class, function(Faker\Generator $faker) {
    return [ 'name' => 'Linux' ];
});

$factory->define(App\DataPackExcess::class, function(Faker\Generator $faker) {
    return [
        'type'  => 'bandwidth',
        'value' => $faker->numberBetween(0, 25),
        'unit'  => 'MB',
    ];
});

$factory->define(App\PayAsYouGo::class, function(Faker\Generator $faker) {
    return [
        'bareMetalId'    => $faker->numberBetween(0, 100),
        'customerNumber' => $faker->numberBetween(0, 100),
        'model'          => $faker->numberBetween(0, 100),
        'pricePerGb'     => '0,50€',
        'pricePerHour'   => '0,50€',
        'startedAt'      => $faker->unixTime,
        'destroyedAt'    => $faker->unixTime,
    ];
});

$factory->define(App\Notes::class, function(Faker\Generator $faker) {
    return [
        'server_id' => function() {
            return factory(App\Server::class)->create()->id;
        },

        'user_id'   => function() {
            return factory(App\User::class)->create()->id;
        },

        'note'      =>$faker->text(200)
    ];
});
