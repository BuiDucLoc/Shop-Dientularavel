<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\thuonghieu_model;
use App\Models\category_model;
class Tintuc_Controller extends Controller
{
    public function tintuc(){
    	$category = category_model::where('category_status',1)->orderby('id','desc')->get();
        $thuonghieu = thuonghieu_model::where('thuonghieu_status',1)->orderby('id','desc')->get();
    	return view('pages.tintuc.tintuc',['category'=>$category,'thuonghieu'=>$thuonghieu]);
    }
    public function baiviet(){
    	$category = category_model::where('category_status',1)->orderby('id','desc')->get();
        $thuonghieu = thuonghieu_model::where('thuonghieu_status',1)->orderby('id','desc')->get();
    	return view('pages.baiviet.baiviet',['category'=>$category,'thuonghieu'=>$thuonghieu]);
    }
    public function diachi(){
    	$category = category_model::where('category_status',1)->orderby('id','desc')->get();
        $thuonghieu = thuonghieu_model::where('thuonghieu_status',1)->orderby('id','desc')->get();
    	return view('pages.diachi.diachi',['category'=>$category,'thuonghieu'=>$thuonghieu]);
    }
}
