<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thuonghieu_model extends Model
{
	protected $table = 'tbl_thuonghieu';
	protected $primaryKey = 'id';
	protected $fillable = ['thuonghieu_name','thuonghieu_mota','thuonghieu_status',];
	public function sanpham_th() {
		return $this->hasMany('App\Models\sanpham_model');
   }
}
