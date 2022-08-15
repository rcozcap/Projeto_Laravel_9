<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing posts
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('text');
            $table->string('type');
            $table->string('link')->nullable();
            $table->timestamps();
        });

        // Create table for storing folders
        Schema::create('folders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('text');
            $table->timestamps();
        });

        // Create table for associating posts to folders (Many-to-Many)
        Schema::create('posts_folders', function (Blueprint $table) {
            $table->integer('folder_id')->unsigned();
            $table->integer('post_id')->unsigned();

            $table->foreign('folder_id')->references('id')->on('folders')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['folder_id', 'post_id']);
        });

        // Create table for associating folders to users (Many-to-Many)
        Schema::create('folders_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('folder_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('folder_id')->references('id')->on('folders')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'folder_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
        Schema::drop('folders');
        Schema::drop('posts_folders');
        Schema::drop('folders_user');
    }
}
