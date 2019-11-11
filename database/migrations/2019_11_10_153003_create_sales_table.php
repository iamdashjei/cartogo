<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('beginning_balance')->default(null);
            $table->string('sales')->default(null);
            $table->string('order')->default(null);
            $table->string('ending_balance')->default(null);
            $table->date('expiry_date')->default(null);
            $table->string('signatory')->default(null);
            $table->bigInteger('outlet_id')->unsigned();
            $table->string('note')->default(null);
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
        Schema::dropIfExists('sales');
    }
}
