<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFKs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::table('models', function ($table) {
            $table->foreign('makes_id')->references('id')->on('makes');
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
        //
    }
}
