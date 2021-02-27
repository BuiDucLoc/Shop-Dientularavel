<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\thuonghieu_model;
use App\Models\sanpham_model;
use App\Models\category_model;
use App\Models\customer_model;
use App\Models\feeship_model;
use App\Models\thanhpho_model;
use App\Models\quanpro_model;
use App\Models\phuongwar_model;
use Illuminate\Support\Facades\Session;
use Cart;
class Cart_Controller extends Controller
{
    // them giỏ hàng truyền qua web
    // public function addcart(Request $request){
    // 	$request->soluong;
    // 	$sp_id = $request->sanpham_id;
    // 	$data = sanpham_model::where('id',$sp_id)->get();
    //     echo "<pre>";
    // 	foreach ($data as $key => $value) {
    // 		$cart['id'] = $value->id;
	   //  	$cart['qty'] = $request->soluong;
    // 		$cart['name'] = $value->sanpham_name;
	   //  	$cart['price'] = $value->sanpham_gia;
	   //  	$cart['weight'] = 100;
	   //  	$cart['options']['image'] = $value->sanpham_image;
    // 	}
    // 	Cart::add($cart);
    //     // Cart::add('293ad', 'Product 1', 1, 9.99);
    // 	return redirect('giohang');
    // }
    // web truyền lại hiện thoong tin gio hang
    // public function giohang(){
    // 	$category = category_model::where('category_status',1)->orderby('id','desc')->get();
    //     $thuonghieu = thuonghieu_model::where('thuonghieu_status',1)->orderby('id','desc')->get();
    //     return view('pages.cart.giohang')->with(['category'=>$category,'thuonghieu'=>$thuonghieu]);
    // }
    // public function delete_giohang($id){
    // 	Cart::remove($id);
    // 	return redirect('giohang');
    // }
    // public function delete_all(){
    //     Cart::destroy();
    //     return redirect('giohang');
    // }
    // public function capnhap(Request $request){
    // 	$id =  $request->row_id;
    // 	$sl =  $request->soluong;
    // 	Cart::update($id,$sl);
    // 	return redirect('giohang');
    // }
    //them nhanh gio hang
    // public function them_gh( Request $request, $id){
    // 	$data = sanpham_model::where('id',$id)->get();
    // 	foreach ($data as $key => $value) {
    // 		$cart['id'] = $value->id;
	   //  	$cart['qty'] = 1;
    // 		$cart['name'] = $value->sanpham_name;
	   //  	$cart['price'] = $value->sanpham_gia;
	   //  	$cart['weight'] = 100;
	   //  	$cart['options']['image'] = $value->sanpham_image;
    // 	}
    // 	Cart::add($cart);
    // 	return redirect('sanpham')->with(['messige'=>'Success!Mua sản phẩm thành công.','alert'=>'alert-successg']);
    // }


//giohangajax
    public function addcart(Request $request){
        $sl = $request->soluong;
        $sp_id = $request->sanpham_id;
        $data = sanpham_model::find($sp_id);
        $cart = Session::get('cart');
        if($cart ==true){
            $check = 0;
            foreach ($cart as $key => $value) {
            if ($value['id']==$sp_id) {
               $cart[$sp_id]['qty'] +=$sl;
               $check ++;
           }
        }
             if ($check==0) {
                $cart[$sp_id] = array(
                                'id'=>$data->id,
                                'name'=>$data->sanpham_name,
                                'price'=>$data->sanpham_gia,
                                'image'=>$data->sanpham_image,
                                'qty'=>$sl,
                            );
                 Session::put('cart',$cart);
            }
        }
        else {
              $cart[$sp_id] = array(
                                'id'=>$data->id,
                                'name'=>$data->sanpham_name,
                                'price'=>$data->sanpham_gia,
                                'image'=>$data->sanpham_image,
                                'qty'=>$sl,
                            );
        }
        Session::put('cart',$cart);
        return redirect('giohang');
    }

    public function cart_ajax(request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart==true) {
                $check_product = 0;
                foreach ($cart as $key => $value) {
                    if ($value['id']==$data['car_product_id']) {
                        $cart[$data['car_product_id']]['qty'] += 1;
                        $check_product ++;
                    }
                }
                if ($check_product == 0) {
                    $cart[$data['car_product_id']] = array(
                            'id'=>$data['car_product_id'],
                            'name'=>$data['car_product_name'],
                            'price'=>$data['car_product_gia'],
                            'image'=>$data['car_product_image'],
                            'qty'=>$data['car_product_sl'],
                        );
                    Session::put('cart',$cart);
                    }   
            }
        else {
            $cart[$data['car_product_id']] = array(
                'id'=>$data['car_product_id'],
                'name'=>$data['car_product_name'],
                'price'=>$data['car_product_gia'],
                'image'=>$data['car_product_image'],
                'qty'=>$data['car_product_sl'],
            );
        }
            Session::put('cart',$cart); 
    }

    public function giohang(){
        $category = category_model::where('category_status',1)->orderby('id','desc')->get();
        $thuonghieu = thuonghieu_model::where('thuonghieu_status',1)->orderby('id','desc')->get();
        $city = thanhpho_model::orderby('matp','DESC')->get();
        return view('pages.cart.giohang_ajax')->with(['category'=>$category,'thuonghieu'=>$thuonghieu,'city'=>$city]);
    }
    public function delete_giohang($id){
        $this->delete($id);
        return redirect('giohang')->with(['messige'=>'Success!xóa sản phẩm thành công.','alert'=>'alert-successg']);
    }
    public function delete($id){
        $cart = Session::get('cart');
        unset($cart[$id]);
        Session::put('cart',$cart);
    }
    public function capnhap(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        foreach ($data['soluong'] as $key => $value) {
           foreach ($cart as $key1 => $value1) {
               if ($value1['id']==$key) {
                  $cart[$key1]['qty'] = $value;
               }
           }
        }
        Session::put('cart',$cart);
        return redirect('giohang')->with(['messige'=>'Success!Cập nhập giỏ hàng công.','alert'=>'alert-successg']);
    }
     public function capnhap1(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        foreach ($data['soluong'] as $key => $value) {
           foreach ($cart as $key1 => $value1) {
               if ($value1['id']==$key) {
                  $cart[$key1]['qty'] = $value;
               }
           }
        }
        Session::put('cart',$cart);
        return redirect('thongtin_donhang')->with(['messige'=>'Success!Cập nhập giỏ hàng công.','alert'=>'alert-successg']);
    }
    public function delete_all(){
       $cart = Session::get('cart');
       Session::forget('cart');
       Session::forget('coupon');
       return redirect('giohang')->with(['messige'=>'Success!xóa thành công.','alert'=>'alert-successg']);
    }
    public function delete_all1(){
       $cart = Session::get('cart');
       Session::forget('cart');
       Session::forget('coupon');
       return redirect('thongtin_donhang')->with(['messige'=>'Success!xóa thành công.','alert'=>'alert-successg']);
    }
    public function delete_giohang1($id){
        $this->delete($id);
        return redirect('thongtin_donhang')->with(['messige'=>'Success!xóa sản phẩm thành công.','alert'=>'alert-successg']);
    }
    
}
