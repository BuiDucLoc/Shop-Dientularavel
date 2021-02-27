<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class magiamgia_model extends Model
{
    protected $table = 'tbl_magiamgia';
    public $timestamps = false;
	protected $primaryKey = 'id';
	protected $fillable = ['coupon_name','coupon_time','coupon_condition','coupon_number','coupon_code'];
}
