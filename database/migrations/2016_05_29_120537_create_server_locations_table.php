<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateServerLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Site')->comment('The site where the bare metal server is located');
            $table->string('Cabinet')->comment('The cabinet the bare metal server is located in.');
            $table->string('Rackspace')->comment('DEPRICATED');
            $table->string('CombinationLock')->comment('DEPRICATED');
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
        Schema::drop('server_locations');
    }
}
