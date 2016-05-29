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

$factory->define(App\DataPackExcess::class, function(Faker\Generator $faker) {
    return [
        'type'  => 'bandwidth',
        'value' => $faker->numberBetween(0, 25),
        'unit'  => 'MB',
    ];
});