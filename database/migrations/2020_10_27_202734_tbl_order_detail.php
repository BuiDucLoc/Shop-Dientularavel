<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order_detal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('detal_sl');
            $table->integer('detal_gia');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('tbl_order')->onDelete('cascade');
            $table->integer('sanpham_id')->unsigned();
            $table->foreign('sanpham_id')->references('id')->on('tbl_sanpham')->onDelete('cascade');
            $table->string('detal_coupon');
            $table->string('detal_feeship');
            $table->integer('detal_method');
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
        Schema::dropIfExists('tbl_order_detal');
    }
}
