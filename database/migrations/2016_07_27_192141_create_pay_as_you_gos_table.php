<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayAsYouGosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('pay_as_you_gos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bareMetalId')->nullable()->comment('The identifier of the bare metal resource');
            $table->string('pool')->nullable()->comment('The pool for this server');
            $table->string('userId')->nullable()->comment('The identifier of the user who is requesting the server');
            $table->string('customerNumber')->nullable()->comment('Customer number');
            $table->integer('model')->nullable()->comment('The number of the model that you purchased');
            $table->string('modelLabel')->nullable()->comment('The label of the model that you purchased');
            $table->string('osId')->nullable()->comment('The identifier of the operating system');
            $table->string('osLabel')->nullable()->comment('The label of the operating system');
            $table->string('pricePerGb')->nullable()->comment('Displays the price that is billed per Gb of traffic.');
            $table->string('pricePerHour')->nullable()->comment('Displays the prive that is billed per hour of instance usage.');
            $table->string('status')->nullable()->comment('The provisioning status of the bare metal resource');            
            $table->string('startedAt')->nullable()->comment('String containing the time in which the instance started to run.');
            $table->string('destroyedAt')->nullable()->comment('(Optional) If the instance is destroyed, shows the time in which was destroyed');
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
        Schema::drop('pay_as_you_gos');
    }
}
