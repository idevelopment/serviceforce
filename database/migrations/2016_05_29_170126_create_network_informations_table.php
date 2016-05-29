<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateNetworkInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('network_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dataPack')->comment('Readable name of the datapack');
            $table->integer('ipsFreeOfCharge')->comment('Amoun of IPs you can get with your bare metal server free of charge.');
            $table->integer('ipsAssigned')->comment('Amount of IPs assigned to the bare metal server.');
            $table->float('excessIpsPrice')->comment('Price per IP for extra IPs');
            $table->integer('DataPackExcess_id')->comment('An object with information about over usage');
            $table->text('macAddresses')->comment('An array with key mac containing all mac addresses of the bare metal server.');
            $table->float('privePerMonth')->comment('Monthly price of the datapack');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('network_informations');
    }
}
