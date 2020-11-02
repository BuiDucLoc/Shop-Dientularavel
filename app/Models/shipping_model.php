<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipping_model extends Model
{
    protected $table = 'tbl_shipping';
	protected $primaryKey = 'id';
	protected $fillable = ['shipping_email','shipping_name','shipping_phone','shipping_diachi','sanpham_ghichu','customer_id',];

	public function customer_ship(){
   		return $this->belongsTo('App\Models\customer_model','customer_id');
   	}
   	public function order_ship(){
   		return $this->hasMany('App\Models\order_model','shipping_id','id');
   	}
}
