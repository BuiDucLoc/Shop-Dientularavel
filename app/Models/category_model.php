<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_model extends Model
{
    protected $table = 'tbl_category';
    protected $primaryKey = 'id';
    protected $fillable = ['category_name','category_mota','category_status',];
    public function sanpham_cate(){
    	return $this->hasMany('App\Models\sanpham_model');
    }
}
