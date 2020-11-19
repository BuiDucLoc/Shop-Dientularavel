<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use App\Models\customer_model;
use App\Models\order_detail_model;
class Mail_Controller extends Controller
{
    public function send_mail($a){
    	// $id = session::get('user_id');
    	// $user = customer_model::find(session::get('user_id'));
    	$name = 'Bùi Đức Lộc';
    	$mail = 'loc.buiduc97@gmail.com';
    	$data = order_detail_model::where('order_id',$a)->get();
    	$data1 = ['dulieu'=>$data];
    	Mail::send('pages.Mail.mail',$data1,function($message) use ($name,$mail){
    		$message->to($mail)->subject('Hóa đơn mua hàng');
    		$message->from($mail,$name);
    	});
    	return redirect('admin/order')->with(['messige'=>'Success!xác nhận đơn hàng thành công.','alert'=>'alert-successg']);
    }
}
