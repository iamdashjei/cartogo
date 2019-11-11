<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutletprofileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outletprofiles', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('store_name')->default(null);
            $table->string('type')->default(null);
            $table->string('account')->default(null);
            $table->string('address')->default(null);
            $table->string('showcase_no')->default(null);
            $table->string('size')->default(null);
            $table->string('contact_person')->default(null);
            $table->string('contact_no')->default(null);
            $table->bigInteger('sale_id')->unsigned();
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
        Schema::dropIfExists('outletprofiles');
    }
}
