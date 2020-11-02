<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham_model extends Model
{
	protected $table = 'tbl_sanpham';
	protected $primaryKey = 'id';
	protected $fillable = ['category_id','thuonghieu_id','sanpham_name','sanpham_mota','sanpham_noidung','sanpham_gia','sanpham_image','sanpham_status',];

   	public function category_sp(){
   		return $this->belongsTo('App\Models\category_model','category_id');
   	}

   	public function thuonghieu_sp(){
   		return $this->belongsTo('App\Models\thuonghieu_model','thuonghieu_id');
   	}

   	public function orderdetail_sanpham(){
   		return $this->hasMany('App\Models\order_detail_model','sanpham_id','id');
   	}
}
