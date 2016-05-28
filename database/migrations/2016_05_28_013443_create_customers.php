<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company')->unique();
            $table->string('fname');
            $table->string('name');
            $table->string('address');
            $table->string('zipcode');
            $table->string('city');
            $table->string('country');
            $table->string('phone');
            $table->string('mobile');
            $table->string('email');
            $table->string('vat');         
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
        Schema::drop('customers');
    }
}
