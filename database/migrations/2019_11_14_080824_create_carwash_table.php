<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarwashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carwashes', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('customer')->nullable();
            $table->string('address')->nullable();
            $table->string('service')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('carwashes');
    }
}
