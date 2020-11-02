<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail_model extends Model
{
    protected $table = 'tbl_order_detal';
	protected $primaryKey = 'id';
	protected $fillable = ['detal_sl','detal_gia','order_id','sanpham_id'];
	public function order_orderdetail(){
		return $this->belongsTo('App\Models\order_model','order_id');
	}
	public function sanpham_orderdetail(){
		return $this->belongsTo('App\Models\sanpham_model','sanpham_id');
	}
}
