<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\thuonghieu_model;
use App\Models\sanpham_model;
use App\Models\category_model;
use App\Models\customer_model;
use Session;
use Cart;
use Socialite;
use App\Models\social_model;
use App\Http\Requests\user_request;
class User_Controller extends Controller
{
	public function user_login(){
        $category = category_model::where('category_status',1)->orderby('id','desc')->get();
		return view('pages.user.login')->with(['category'=>$category,]);
	}
    
    public function dangki(user_request $request){
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

    public function login_facebook(){
         return Socialite::driver('facebook')->redirect();
         }

    public function callback(){
        $provider = Socialite::driver('facebook')->user();
        $check = social_model::where('provider_user_id',$provider->getId())->first();
        // $account = social_model::where('provider_user_id',$provider->getId())->first();
        if(!$check){
            $hieu = new social_model(['provider_user_id' => $provider->getId(),'provider' => 'facebook']);
            $orang = customer_model::where('customer_email',$provider->getEmail())->first();
                if(!$orang){
                        $orang = customer_model::create([
                        'customer_name' => $provider->getName(),
                        'customer_email' => $provider->getEmail(),
                        'customer_password' => '',
                        'customer_phone' => '0123456789',
                    ]);
                 }
                 $hieu->customer_social()->associate($orang);
                 $hieu->save();
                $check1 = social_model::where('provider_user_id',$provider->getId())->first();
                $account_name = customer_model::where('id',$check1['customer_id'])->first();
                Session::put('user_id',$account_name->id);
                Session::put('user_name',$account_name->customer_name);
                return redirect('trangchu')->with('message', 'Đăng nhập Admin thành công');
            
        }
        else  
            { 
                $check = social_model::where('provider_user_id',$provider->getId())->first()->toarray();
                $account_name = customer_model::where('id',$check['customer_id'])->first();
                Session::put('user_id',$account_name->id);
                Session::put('user_name',$account_name->customer_name);
                return redirect('trangchu')->with('message', 'Đăng nhập Admin thành công');
            }
        
    }
}
