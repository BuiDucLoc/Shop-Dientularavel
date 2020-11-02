<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\thuonghieu_model;
use App\Models\sanpham_model;
use App\Models\category_model;
use App\Models\customer_model;
use Session;
use Cart;
class Cart_Controller extends Controller
{
    // them giỏ hàng truyền qua web
    public function addcart(Request $request){
    	$request->soluong;
    	$sp_id = $request->sanpham_id;
    	$data = sanpham_model::where('id',$sp_id)->get();
        echo "<pre>";
    	foreach ($data as $key => $value) {
    		$cart['id'] = $value->id;
	    	$cart['qty'] = $request->soluong;
    		$cart['name'] = $value->sanpham_name;
	    	$cart['price'] = $value->sanpham_gia;
	    	$cart['weight'] = 100;
	    	$cart['options']['image'] = $value->sanpham_image;
    	}
    	Cart::add($cart);
        // Cart::add('293ad', 'Product 1', 1, 9.99);
    	return redirect('giohang');
    }
    // web truyền lại hiện thoong tin gio hang
    public function giohang(){
    	$category = category_model::where('category_status',1)->orderby('id','desc')->get();
        $thuonghieu = thuonghieu_model::where('thuonghieu_status',1)->orderby('id','desc')->get();
        return view('pages.cart.giohang')->with(['category'=>$category,'thuonghieu'=>$thuonghieu]);
    }
    public function delete_giohang($id){
    	Cart::remove($id);
    	return redirect('giohang');
    }
    public function delete_all(){
        Cart::destroy();
        return redirect('giohang');
    }
    public function capnhap(Request $request){
    	$id =  $request->row_id;
    	$sl =  $request->soluong;
    	Cart::update($id,$sl);
    	return redirect('giohang');
    }
    //them nhanh gio hang
    public function them_gh( Request $request, $id){
    	$data = sanpham_model::where('id',$id)->get();
    	foreach ($data as $key => $value) {
    		$cart['id'] = $value->id;
	    	$cart['qty'] = 1;
    		$cart['name'] = $value->sanpham_name;
	    	$cart['price'] = $value->sanpham_gia;
	    	$cart['weight'] = 100;
	    	$cart['options']['image'] = $value->sanpham_image;
    	}
    	Cart::add($cart);
    	return redirect('sanpham')->with(['messige'=>'Success!Mua sản phẩm thành công.','alert'=>'alert-successg']);
    }
    
}
