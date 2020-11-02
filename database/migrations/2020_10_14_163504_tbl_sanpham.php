<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblSanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sanpham', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('tbl_category')->onDelete('cascade');
            $table->integer('thuonghieu_id')->unsigned();
            $table->foreign('thuonghieu_id')->references('id')->on('tbl_thuonghieu')->onDelete('cascade');
            $table->string('sanpham_name');
            $table->text('sanpham_mota');
            $table->text('sanpham_noidung');
            $table->string('sanpham_gia');
            $table->string('sanpham_image');
            $table->integer('sanpham_status');
            $table->interger('soluong');
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
        Schema::dropIfExists('tbl_sanpham');
    }
}
