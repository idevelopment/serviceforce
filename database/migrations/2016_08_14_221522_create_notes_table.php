<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->text('note');
            $table->timestamps();
        });

        Schema::create('base_servers_notes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('base_servers_id');
            $table->integer('notes_id');
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
        Schema::drop('base_servers_notes');
        Schema::drop('notes');
    }
}
