<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\thuonghieu_model;
use App\Models\category_model;
class Tintuc_Controller extends Controller
{
    public function tintuc(){
    	$danhmuc = category_model::orderby('id','desc')->get();
     	$thuonghieu = thuonghieu_model::orderby('id','desc')->get();
    	return view('pages.tintuc.tintuc',['category'=>$danhmuc,'thuonghieu'=>$thuonghieu]);
    }
    public function baiviet(){
    	$danhmuc = category_model::orderby('id','desc')->get();
     	$thuonghieu = thuonghieu_model::orderby('id','desc')->get();
    	return view('pages.baiviet.baiviet',['category'=>$danhmuc,'thuonghieu'=>$thuonghieu]);
    }
    public function diachi(){
    	$danhmuc = category_model::orderby('id','desc')->get();
     	$thuonghieu = thuonghieu_model::orderby('id','desc')->get();
    	return view('pages.diachi.diachi',['category'=>$danhmuc,'thuonghieu'=>$thuonghieu]);
    }
}
