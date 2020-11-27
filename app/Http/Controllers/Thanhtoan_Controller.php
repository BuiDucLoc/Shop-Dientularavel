<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\thuonghieu_model;
use App\Models\sanpham_model;
use App\Models\category_model;
use App\Models\customer_model;
use App\Models\shipping_model;
use App\Models\thanhtoan_model;
use App\Models\order_model;
use App\Models\order_detail_model;
use App\Models\feeship_model;
use App\Models\thanhpho_model;
use App\Models\quanpro_model;
use App\Models\phuongwar_model;
use Session;
use File;
use Cart;

class Thanhtoan_Controller extends Controller
{
    public function thanhtoan(){
        $category = category_model::where('category_status',1)->orderby('id','desc')->get();
        return view('pages.thanhtoan.thanhtoan_donhang')->with(['category'=>$category]);
    }
    public function thongtin_donhang(){
        $category = category_model::where('category_status',1)->orderby('id','desc')->get();
        $user_id = Session::get('user_id');
        $data = customer_model::where('id',$user_id)->get();
        $city = thanhpho_model::orderby('matp','DESC')->get();
        return view('pages.thanhtoan.thanhtoan')->with(['data'=>$data,'category'=>$category,'city'=>$city]);
    }
    // public function donhang(Request $request){
    //     $data = new shipping_model();
    //     $data->shipping_email = $request->email;
    //     $data->shipping_name = $request->ten;
    //     $data->shipping_phone = $request->sdt;
    //     $data->shipping_diachi = $request->diachi;
    //     $data->shipping_ghichu = $request->ghichu;
    //     $data->customer_id = Session::get('user_id');
    //     $data->save();
    //     Session::put('shipping_id',$data->id);
    //     return redirect('thanhtoan');
    // }
    public function donhang(Request $request){
        $data = $request->all();
        $shipping = new shipping_model();
        $shipping->shipping_email = $data['email'];
        $shipping->shipping_name = $data['ten'];
        $shipping->shipping_phone = $data['sdt'];
        $shipping->shipping_diachi = $data['diachi'];
        $shipping->shipping_ghichu = $data['ghichu'];
        $shipping->shipping_method = $data['ht_thanhtoan'];
        $shipping->customer_id = Session::get('user_id');
        $shipping->save();
        $shipping_id = $shipping->id;

        $order_code = substr(md5(microtime()),rand(0,26),5);
        $order = new order_model();
        $order->order_tongtien = $data['tong'];
        $order->order_trangthai = 1;
        $order->shipping_id = $shipping_id;
        $order->order_code = $order_code;
        $order->customer_id = Session::get('user_id');
        $order->fee_ship = $data['fee_ship'];
        $order->fee_giamgia = $data['coupon'];
        $order->save();

        $order_id = $order->id;
        if(Session::get('cart')){
            $dl = Session::get('cart');
            foreach ($dl as $key => $value) {
                $data2 = new order_detail_model();
                $data2->detal_sl = $value['qty'];
                $data2->detal_gia = $value['price'];
                $data2->order_id = $order_id;
                $data2->sanpham_id = $value['id'];
                $data2->detal_coupon = $data['coupon'];
                $data2->detal_feeship = $data['fee_ship'];
                $data2->detal_method = $data['ht_thanhtoan'];
                $data2->save();
            }
        }
        Session::forget('cart');
        Session::forget('coupon');
        Session::forget('fee_ship');
    }
    // public function hinhthucthanhtoan(Request $request){
    //     $data = new thanhtoan_model();
    //     $data->thanhtoan_hinhthuc = $request->hinhthuc;
    //     $data->thanhtoan_trangthai = 'Đang chờ xử lý';
    //     $data->save();

    //     // inser don hang tron order
    //     $data1 = new order_model();
    //     $data1->order_tongtien = Cart::subtotal();
    //     $data1->order_trangthai = "Đang chờ xử lý";
    //     $data1->shipping_id = Session::get('shipping_id');
    //     $data1->thanhtoan_id = $data->id;
    //     $data1->save();
    //     //inser order_deatil
    //     $dl = Cart::content();
    //     foreach ($dl as $key => $value) {
    //         $data2 = new order_detail_model();
    //         $data2->detal_sl = $value->qty;
    //         $data2->detal_gia = $value->price;
    //         $data2->order_id = $data1->id;
    //         $data2->sanpham_id = $value->id;
    //         $data2->save();
    //     }
    //     if ($data->thanhtoan_hinhthuc==1) {
    //        echo "trang thanh toán ATM";
    //     }
    //     elseif($data->thanhtoan_hinhthuc==2){
    //         Cart::destroy();
    //         return redirect('thanhtoantienmat');
    //     }
    //     else{
    //         echo "trang thanh toán thẻ gi nợ";
    //     }

    // }
    // public function thanhtoantienmat(){
    //     $category = category_model::where('category_status',1)->orderby('id','desc')->get();
    //     return view('pages.thanhtoan.thanhtoantienmat')->with(['category'=>$category]);
    // }
    //admin_order
    public function order(){
        $data = order_model::all();
        return view('admin.donhang')->with(['data'=>$data]);
    }
    public function chitiet_donhang($id){
        $thongtin = order_model::find($id);
        $data = order_detail_model::where('order_id',$id)->get();
        return view('admin.chitiet_donhang')->with(['data'=>$data,'thongtin'=>$thongtin]);
    }
    public function delete_donhang($id){
        $data = order_model::find($id);
        $data->delete($id);
        return redirect('admin/order')->with(['messige'=>'Success!Xóa thành công.','alert'=>'alert-successg']);
    }

    //vanchuyen
    public function show_feeship(Request $request){
        $data = $request->all();
        if($data['matp']){
            $fee_ship = feeship_model::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_xaid',$data['maxp'])->get();
            if ($fee_ship->count()>0) {
                foreach ($fee_ship as $key => $value) {
                Session::put('fee_ship',$value->fee_ship);
                    }
            }
            else{
                Session::put('fee_ship',30000);
            }
        }
    }
    public function delete_vanchuyen(){
        Session::forget('fee_ship');
        echo"xóa phí vận chuyển thành công!";
    }
  
}
