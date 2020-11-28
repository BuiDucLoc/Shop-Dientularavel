<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Models\admin_model;
use App\Http\Middleware\login;
class Admin_Controller extends Controller
{
   
    public function index(){
    	return view('login_admin');
    }
    public function dasboard(){
    	return view('admin.home_admin');
    }
    public function dangnhap(Request $request){
    	$email = $request->email_admin;
    	$password =md5($request->password_admin);
    	$data = admin_model::where([
    		['admin_email',$email],
    		['admin_password',$password],
    	])->get()->toarray();
        print_r($data);
    	if ($data!=null) {
            foreach ($data as $key => $value) {
                Session::put('admin_id',$value['id']);
                Session::put('admin_name',$value['admin_name']);
                // echo Session::get('admin_name');
            }
            return redirect('admin/dasboard')->with(['messige'=>'Success!Đăng nhập thành công.','alert'=>'alert-successg']);
        }
        else{
            return redirect('login')->with(['messige'=>'Danger!Đăng nhập thất bại.','alert'=>'alert-danger']);
            
        }
    }
    public function dangxuat(){
    	Session::forget('admin_name');
        Session::forget('admin_id');
        return redirect('login');
    }

    //facebook

    
    
}
