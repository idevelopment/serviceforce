<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateOperatingSystemsTable
 */
class CreateOperatingSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operating_systems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('osId')->comment('The identifier for the Operating Systems resource');
            $table->string('name')->comment('The name of the Operating Systems resource');
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
        Schema::drop('operating_systems');
    }
}
