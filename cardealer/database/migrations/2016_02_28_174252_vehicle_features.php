<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VehicleFeatures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_features', function (Blueprint $table) {
            $table->integer('features_id')->unsigned();
            $table->integer('vehicles_id')->unsigned();

        });
//        Schema::table('vehicle_features', function ($table) {
//            $table->foreign('features_id')->references('id')->on('features');
//            $table->foreign('vehicles_id')->references('id')->on('vehicles');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('vehicle_features');
    }
}
