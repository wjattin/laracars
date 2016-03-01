<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Models extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model');
            $table->integer('makes_id')->unsigned();
        });
        /* Schema::table('models', function ($table) {
            $table->foreign('makes_id')->references('id')->on('makes');
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
        //Schema::dropIfExists('models');
    }
}
