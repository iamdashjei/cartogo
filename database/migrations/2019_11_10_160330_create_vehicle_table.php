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
            $table->string('platenumber')->default(null);
            $table->bigInteger('lastkm_reading')->unsigned()->default(0);
            $table->string('lastpassenger')->default(null);
            $table->date('lasttime_out')->default(null);
            $table->bigInteger('lasttotal_load')->unsigned()->default(0);
            $table->string('brand')->default(null);
            $table->string('model')->default(null);
            $table->string('type')->default(null);
            $table->string('year')->default(null);
            $table->string('seat_no')->default(null);
            $table->string('body_type')->default(null);
            $table->string('engine')->default(null);
            $table->string('fuel_type')->default(null);
            $table->integer('fuel_capacity')->default(0);
            $table->double('net_weight')->default(0);
            $table->double('net_capacity')->default(0);
            $table->double('shipping_weight')->default(0);
            $table->string('image')->default(null);
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
