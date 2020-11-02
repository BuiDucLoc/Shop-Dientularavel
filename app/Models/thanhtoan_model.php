<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thanhtoan_model extends Model
{
    protected $table = 'tbl_thanhtoan';
	protected $primaryKey = 'id';
	protected $fillable = ['thanhtoan_hinhthuc','thanhtoan_trangthai',];
	public function order_thanhtoan(){
		return $this->hasMany('App\Models\order_model','thanhtoan_id','id');
	}
}
