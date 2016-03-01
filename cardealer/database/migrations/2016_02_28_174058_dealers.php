<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dealers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('dealers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('location_name');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('state');
            $table->integer('zip');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('email');
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
        // Schema::dropIfExists('dealers');
    }
}
