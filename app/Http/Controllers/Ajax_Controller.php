<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\thuonghieu_model;
use App\Models\sanpham_model;
use App\Models\category_model;
use Session;
use File;
use App\Http\Requests\sanpham_request;
class Ajax_Controller extends Controller
{
    public function danhmuc($id){
    	$data = sanpham_model::where('category_id',$id)->get();
    	foreach ($data as $key => $value) {
    		echo $value->sanpham_name;
		}
	}
}
