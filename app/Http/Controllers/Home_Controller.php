<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category_model;
use App\Models\thuonghieu_model;
use App\Models\sanpham_model;
class Home_Controller extends Controller
{	
	//trangchu
 	public function index(Request $request){
 		
 		$category = category_model::where('category_status',1)->orderby('id','desc')->get();
 		$thuonghieu = thuonghieu_model::where('thuonghieu_status',1)->orderby('id','desc')->get();
 		$allsanpham = sanpham_model::where('sanpham_status',1)->orderby('id','desc')->limit(6)->get();
 		return view('pages.home')->with(['category'=>$category,'thuonghieu'=>$thuonghieu,'allsanpham'=>$allsanpham]);
 	}
 	//tim kiem
 	public function timkiemsanpham(Request $request){
 		$keyword = $request->timkiem;
 		$data = sanpham_model::where('sanpham_name','like','%'.$keyword.'%')->get();
 		$category = category_model::where('category_status',1)->orderby('id','desc')->get();
 		$thuonghieu = thuonghieu_model::where('thuonghieu_status',1)->orderby('id','desc')->get();
 		return view('pages.search.search')->with(['category'=>$category,'thuonghieu'=>$thuonghieu,'data'=>$data]);
 	}
}
