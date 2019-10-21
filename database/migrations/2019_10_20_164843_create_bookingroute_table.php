<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingrouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_route', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->nullable();
            $table->string('address')->default(null);
            $table->string('lat')->default(null);
            $table->string('lng')->default(null);
            $table->text('description')->default(null);
            $table->date('route_date')->default(null);
            
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
        Schema::dropIfExists('booking_route');
    }
}
