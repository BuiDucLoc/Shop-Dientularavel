<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use App\Models\customer_model;
use App\Models\order_detail_model;
use App\Models\order_model;
class Mail_Controller extends Controller
{
    public function send_mail($a){
    	// $id = session::get('user_id');
    	// $user = customer_model::find(session::get('user_id'));
    	$name1 = 'Bùi Đức Lộc';
    	$mail1 = 'lockupin@gmail.com';
    	$data = order_detail_model::where('order_id',$a)->get();
        $order = order_model::where('id',$a)->get();
    	$data1 = ['dulieu'=>$data,'order'=>$order];
    	Mail::send('pages.Mail.mail',$data1,function($message) use ($name1,$mail1){
    		$message->to($mail1)->subject('Hóa đơn mua hàng');
    		$message->from($mail1,$name1);
    	});
    	return redirect('admin/order')->with(['messige'=>'Success!xác nhận đơn hàng thành công.','alert'=>'alert-successg']);
    }
}
