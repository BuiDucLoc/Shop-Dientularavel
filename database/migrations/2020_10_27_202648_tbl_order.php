<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_tongtien');
            $table->string('order_trangthai');
            $table->integer('shipping_id')->unsigned();
            $table->foreign('shipping_id')->references('id')->on('tbl_shipping')->onDelete('cascade');
            $table->integer('thanhtoan_id')->unsigned();
            $table->foreign('thanhtoan_id')->references('id')->on('tbl_thanhtoan')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_order');
    }
}
