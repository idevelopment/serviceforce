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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
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
        'serverType'   => 'Dedicated',
        'startDate'    => $faker->time(),
        'endDate'      => $faker->time(),
        'contractTerm' => '1 Year'
    ];
});

$factory->define(App\Server::class, function(Faker\Generator $faker) {
    return [
        'ram'            => '8GB',
        'kvm'            => 'yes',
        'serverType'     => 'dedicated',
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

// bareMetalId	            integer The identifier of the bare metal resource
// serverName	            string	The name of the bare metal server
// serverType	            string	The type of the bare metal resource
// reference	            string	A reference for the bare metal server
// location	                object	An object with location information
// server	                object	An object with server information
// network	                object	An object with network information
// serverHostingPack	    object	An object with pack information
// serviceLevelAgreement	object	An object with SLA information
$factory->define(App\BaseServers::class, function(Faker\Generator $faker) {
    return [
        'bareMetalId'           => $faker->numberBetween(0, 250),
        'serverName'            => $faker->name,
        'serverType'            => 'dedicated',
        'reference'             => $faker->text(200),
        'ServerLocation_id'     => 1,
        'NetworkInformation_id' => 1,
        'serverHostingPack_id'  => 1,
        'Sla_id'                => 1
    ];
});

$factory->define(App\NetworkInformation::class, function(Faker\Generator $faker) {
    return [
        'dataPack'        => $faker->name,
        'ipsFreeOfCharge' => $faker->numberBetween(0, 3),
        'ipsAssigned'     => $faker->numberBetween(0, 3),
        'excessIpsPrice'  => '4',
        'dataPackExpress' => '1',
        'macAddresses'    => $faker->ipv4,
        'pricePerMonth'   => '2,48',
    ];
});


$factory->define(App\DataPackExcess::class, function(Faker\Generator $faker) {
    return [
        'type'  => 'bandwidth',
        'value' => $faker->numberBetween(0, 25),
        'unit'  => 'MB',
    ];
});