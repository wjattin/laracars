<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Login extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password',60);
            $table->integer('status')->default(0);
            $table->integer('profile_id')->unsigned();
            $table->timestamps();
        });
        /*
        Schema::table('login', function ($table) {
            $table->foreign('profile_id')->references('id')->on('profiles');
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('login');
    }
}
