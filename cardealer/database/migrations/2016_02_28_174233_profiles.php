<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Profiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first');
            $table->string('last');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('email');
            $table->integer('dealers_id')->unsigned();
            $table->timestamps();

        });
//        Schema::table('profiles', function ($table) {
//            $table->foreign('dealers_id')->references('id')->on('dealers');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('profiles');
    }
}
