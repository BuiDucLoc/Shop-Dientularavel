<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\magiamgia_model;
use Session;
class Magiamgia_Controller extends Controller
{
    // admin
    public function themmagiamgia(){
    	return view('admin.magiamgia.magiamgia');
    }
   public function postmagiamgia(Request $request){
        $data = new magiamgia_model();
        $data->coupon_name = $request->tengiamgia;
        $data->coupon_sl = $request->soluong;
        $data->coupon_condition = $request->dieukien;
        $data->coupon_number = $request->tiengiam;
        $data->coupon_code = $request->magiamgia;
        $data->save();
       	return redirect('admin/magiamgia/them')->with(['messige'=>'Success!Thêm danh mục thành công.','alert'=>'alert-successg']);
    }
    public function magiamgia(){
    	$data = magiamgia_model::orderby('id','desc')->get();
    	return view('admin.magiamgia.showmagiamgia')->with(compact('data'));
    }
    public function suamagiamgia($n){
        $data = magiamgia_model::find($n);
        return view('admin.magiamgia.edit_magiamgia',['data'=>$data]);
    }
    public function postma(Request $request, $a){
        $data = magiamgia_model::find($a);
        $data->coupon_name = $request->tengiamgia;
        $data->coupon_sl = $request->soluong;
        $data->coupon_condition = $request->dieukien;
        $data->coupon_number = $request->tiengiam;
        $data->coupon_code = $request->magiamgia;
        $data->save();
        return redirect('admin/magiamgia')->with(['messige'=>'Success!Sửa Thành công.','alert'=>'alert-successg']);
    }
    public function xoa($id){
        $data = magiamgia_model::find($id);
        $data->delete($id);
        return redirect('admin/magiamgia')->with(['messige'=>'Success!Xóa thành công.','alert'=>'alert-successg']);
    }
//index
    public function check_giamgia(Request $request){
        $data = $request->all();
        $coupon = magiamgia_model::where('coupon_code',$data['ma'])->first();
        if ($coupon) {
            $count_coupon = $coupon->count();
            if ($count_coupon>0) {
                $coupon_session = Session::get('coupon');
                if ($coupon_session==true) {
                    $cou[] = [
                        "coupon_code"=>$coupon->coupon_code,
                        "coupon_condition"=>$coupon->coupon_condition,
                        "coupon_number"=>$coupon->coupon_number,
                    ];
                    Session::put('coupon',$cou);
                }
                else{
                    $cou[] = [
                        "coupon_code"=>$coupon->coupon_code,
                        "coupon_condition"=>$coupon->coupon_condition,
                        "coupon_number"=>$coupon->coupon_number,
                    ];
                    Session::put('coupon',$cou);
                }
                Session::save();
                echo "Sử dụng mã giảm giá thành công";
            }
        }
        else{
             echo "Mã giảm giá không hợp lệ kiểm tra lại";
        }
    }
    public function delete_giamgia(){
        $a = session::forget('coupon');
        echo "Xóa mã giảm giá thành công!";
    }
}
