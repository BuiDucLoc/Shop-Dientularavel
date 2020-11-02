<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\thuonghieu_model;
use App\Models\sanpham_model;
use App\Models\category_model;
use App\Models\customer_model;
use Session;
use Cart;
class User_Controller extends Controller
{
	public function user_login(){
        $category = category_model::where('category_status',1)->orderby('id','desc')->get();
		return view('pages.user.login')->with(['category'=>$category,]);
	}
    
    public function dangki(Request $request){
    	$data = new customer_model();
    	$data->customer_name = $request->ten;
    	$data->customer_email = $request->email;
    	$data->customer_password =md5($request->password);
    	$data->customer_phone = $request->phone;
    	$data->save();
    	return redirect('user_login')->with(['messige'=>'Success! Đăng kí thành công.','alert'=>'alert-successg']);
    }
    public function dangnhap(Request $request){
    	$username = $request->username;
    	$password = md5($request->password); 
    	$data = customer_model::where('customer_email',$username)->where('customer_password',$password)->get()->toArray();
    	echo "<pre>";
    	print_r($data);
    	if ($data) {
    		foreach ($data as $key => $value) {
    		Session::put('user_id',$value['id']);
            Session::put('user_name',$value['customer_name']);
            Session::forget('Cart');
            Session::forget('shipping_id');
    		return redirect('trangchu')->with(['messige'=>'Success! Đăng nhập thành công.','alert'=>'alert-successg']);
    		}
    	}
    	else{
    		return redirect('user_login')->with(['messige'=>'Success! Đăng nhập thất bại.','alert'=>'alert-danger']);
    	}
    }
    public function dangxuat(){
    	Session::flush();
        return redirect('trangchu')->with(['messige'=>'Success! Đăng xuất thành công.','alert'=>'alert-successg']);
    }
}
