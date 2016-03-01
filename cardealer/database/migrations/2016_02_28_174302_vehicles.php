<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('make');
            $table->string('model');
            $table->integer('year');
            $table->string('transmission');
            $table->string('veh_condition');
            $table->text('comments');
            $table->integer('price');
            $table->integer('dealers_id')->unsigned();
        });
        Schema::table('vehicles', function ($table) {
            $table->foreign('dealers_id')->references('id')->on('dealers');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('vehicles');
    }
}
