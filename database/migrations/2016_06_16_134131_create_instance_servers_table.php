<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstanceServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instance_servers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bareMetalId')->comment('The identifier of the bare Metal Resource');
            $table->integer('model_id')->comment('The id of the model that you purchased');
            $table->string('LWS_customer_number')->comment('Your customer_id');
            $table->string('pricePerGb')->comment('Displays the price that is billed per GB of traffic.');
            $table->string('pricePerHour')->comment('Displays the price that is billed per hour of instance usage.');
            $table->string('startedAt')->comment('String containing the time in which the instance started to run.');
            $table->string('destroyedAt')->comment('Optional -> If the instance is destroyed, show the time when destroyed');
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
        Schema::drop('instance_servers');
    }
}
