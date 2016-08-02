<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ram')->comment('The amount of RAMi n the bare metal server');
            $table->string('kvm')->comment('Flag to indicate KVM is avaible in the bare metal server. YES/No');
            $table->string('serverType')->comment('Type of the bare metal server');
            $table->string('processorType')->comment('Processor type of the bare metal server');
            $table->string('processorSpeed')->comment('Clock speed of the processor');
            $table->integer('numberOfCpus')->comment('number of processors in the bare metal server');
            $table->integer('numberOfCores')->comment('Number of cores per processor');
            $table->string('hardDisks')->comment('Amount and size of harddisks (eg: 1x1TB)');
            $table->string('hardwareRaid')->comment('Flag to indicate the bare metal server is equipped with hardware raid (Yes/No)');
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
        Schema::drop('servers');
    }
}
