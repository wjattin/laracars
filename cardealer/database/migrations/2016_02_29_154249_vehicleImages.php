<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VehicleImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicleImages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicles_id')->unsigned();;
            $table->string('file_name');

        });
        Schema::table('vehicleImages', function ($table) {
            $table->foreign('vehicles_id')->references('id')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
