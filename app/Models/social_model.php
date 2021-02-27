<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class social_model extends Model
{
   	protected $table = 'tbl_social';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    protected $fillable = ['provider_user_id','provider','customer_id',];

    public function customer_social(){
   		return $this->belongsTo('App\Models\customer_model','customer_id');
   	}
}
