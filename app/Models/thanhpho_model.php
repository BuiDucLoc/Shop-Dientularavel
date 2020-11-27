<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thanhpho_model extends Model
{	
    public $timestamps = false;
   	protected $table = 'tbl_tinhthanhpho';
	protected $primaryKey = 'matp';
	protected $fillable = ['name_city','type'];
	
}
