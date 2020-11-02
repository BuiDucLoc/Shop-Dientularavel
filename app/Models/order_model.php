<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_model extends Model
{
    protected $table = 'tbl_order';
	protected $primaryKey = 'id';
	protected $fillable = ['order_tongtien','order_trangthai','shipping_id','thanhtoan_id',];
	public function shipping_order(){
		return $this->belongsTo('App\Models\shipping_model','shipping_id');
	}
	public function thanhtoan_order(){
		return $this->belongsTo('App\Models\thanhtoan_model','thanhtoan_id');
	}
	public function orderdetail_order(){
		return $this->hasMany('App\Models\order_detail_model','order_id','id');
	}
}
