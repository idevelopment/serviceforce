<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateBaseServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_servers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bareMetalId')->comment('The identifier of the bare metal resource.');
            $table->string('serverName')->comment('The name of the bare metal server.');
            $table->string('serverType')->comment('The type of the bare metal server.');
            $table->string('reference')->comment('A reference to the bare metal server.');
            $table->integer('ServerLocation_id')->comment('An object with the location information');
            $table->integer('Server_id')->comment('An object with the server information');
            $table->integer('network_informations_id')->comment('An object wuth the netwokr information');
            $table->integer('serverHostingPack')->comment('An object with the pack information');
            $table->integer('sla_id')->comment('An object with SLA information');
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
        Schema::drop('base_servers');
    }
}
