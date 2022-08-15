<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MessagesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing messages
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('e-mail')->nullable();
            $table->string('subject');
            $table->string('text');
            $table->boolean('unread');
            $table->timestamps();
        });

        // Create table for associating messages to users (Many-to-Many)
        Schema::create('message_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('message_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('message_id')->references('id')->on('messages')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'message_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('message_user');
        Schema::drop('messages');
    }
}
