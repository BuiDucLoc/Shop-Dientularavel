<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use\App\Models\thanhpho_model;
use\App\Models\phuongwar_model;
use\App\Models\quanpro_model;

class feeship_model extends Model
{
    protected $table = 'tbl_feeship';
    protected $primaryKey = 'id';
    protected $fillable = ['fee_matp','fee_maqh','fee_xaid','fee_ship'];
    public $timestamps = false;

    public function thanhpho_feeship(){
   		return $this->belongsTo('App\Models\thanhpho_model','fee_matp');
   	}
   	public function quanhuyen_feeship(){
   		return $this->belongsTo('App\Models\quanpro_model','fee_maqh');
   	}
   	public function xaphuong_feeship(){
   		return $this->belongsTo('App\Models\phuongwar_model','fee_xaid');
   	}
}
