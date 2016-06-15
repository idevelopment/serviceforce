<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateDataPackExcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pack_excesses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->comment('The datapack type, either bandwidth or datatraffic.');
            $table->float('value')->comment('Price used for overusage calculation per measurement unit.');
            $table->string('unit')->comment('Measuring unit used for overusage calculation');
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
        Schema::drop('data_pack_excesses');
    }
}
