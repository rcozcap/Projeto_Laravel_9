<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('level');
            $table->string('name');
            $table->string('last_name');
            $table->string('photo');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('pass_rem');
            $table->date('birth');
            $table->string('job');
            $table->string('spec')->nullable();
            $table->string('educ_lvl');
            $table->string('phone')->unique();
            $table->string('lang_1')->nullable();
            $table->string('lang_2')->nullable();
            $table->string('lang_3')->nullable();
            $table->integer('occup_time');
            $table->string('overview');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
