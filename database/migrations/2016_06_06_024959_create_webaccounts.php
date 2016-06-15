<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebaccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('WebAccounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscription_id');            
            $table->string('name');
            $table->string('customer');
            $table->integer('subscription_status');
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
        Schema::drop('WebAccounts');
    }
}
