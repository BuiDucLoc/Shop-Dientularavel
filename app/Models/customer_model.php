<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_model extends Model
{
    protected $table = 'tbl_customers';
    protected $primaryKey = 'id';
    protected $fillable = ['customer_name','customer_email','customer_password','customer_phone'];

    public function shipping_cus(){
    	return $this->hasMany('App\Models\shipping_model','customer_id','id');
    }
}
