<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quanpro_model extends Model
{
    public $timestamps = false;
   	protected $table = 'tbl_quanhuyen';
	protected $primaryKey = 'maqh';
	protected $fillable = ['name_quanhuyen','type','matp'];
}
