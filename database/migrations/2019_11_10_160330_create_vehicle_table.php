<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('platenumber')->nullable();
            $table->bigInteger('lastkm_reading')->nullable();
            $table->string('lastpassenger')->nullable();
            $table->time('lasttime_out')->nullable();
            $table->bigInteger('lasttotal_load')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('type')->nullable();
            $table->string('year')->nullable();
            $table->string('seat_no')->nullable();
            $table->string('body_type')->nullable();
            $table->string('engine')->nullable();
            $table->string('fuel_type')->nullable();
            $table->integer('fuel_capacity')->nullable();
            $table->double('net_weight')->nullable();
            $table->double('net_capacity')->nullable();
            $table->double('shipping_weight')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
