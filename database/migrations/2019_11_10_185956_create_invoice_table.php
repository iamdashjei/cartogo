<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('invoice_no')->default(null);
            $table->double('total_sales')->default(0);
            $table->double('less_vat')->default(0);
            $table->double('net_vat')->default(0);
            $table->double('vat_sales')->default(0);
            $table->double('vat_amount')->default(0);
            $table->double('amount_due')->default(0);
            $table->integer('outlet_id')->default(null);
            $table->string('notes')->default(null);
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
        Schema::dropIfExists('invoices');
    }
}
