<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateServerHostingPacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server_hosting_packs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference')->comment('Reference set for the bare metal server');
            $table->integer('bareMetalId')->comment('The identifier of the bare metal resource.');
            $table->string('serverName')->comment('The name of the bare metal server');
            $table->string('serverType')->comment('The type of the bare metal resource');
            $table->date('startDate')->date('Bare metal contract start date.');
            $table->date('endDate')->comment('Bare metal contract end date');
            $table->string('contractTerm')->comment('Applied contract term');
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
        Schema::drop('server_hosting_packs');
    }
}
