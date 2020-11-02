<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblShipping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_shipping', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shipping_email');
            $table->string('shipping_name');
            $table->string('shipping_phone');
            $table->string('shipping_diachi');
            $table->string('shipping_ghichu');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('tbl_customers')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_shipping');
    }
}
