<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsedstockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usedstocks', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('invoice_no')->default(null);
            $table->string('product_name')->default(null);
            $table->double('unit_price')->default(0);
            $table->integer('qty')->default(0);
            $table->double('total')->default(0);
            $table->string('payment_method')->default(null);
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
        Schema::dropIfExists('usedstocks');
    }
}
