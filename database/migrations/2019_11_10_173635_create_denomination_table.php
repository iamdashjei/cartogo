<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenominationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denominations', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('payment_method')->default(null);
            $table->integer('qty')->default(0);
            $table->string('type')->default(0);
            $table->double('amount')->default(0);
            $table->double('total')->default(0);
            $table->string('notes')->default(null);
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
        Schema::dropIfExists('denominations');
    }
}
