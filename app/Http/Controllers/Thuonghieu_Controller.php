<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\thuonghieu_model;
use App\Models\category_model;
use App\Models\sanpham_model;
use Session;
use App\Http\Requests\thuonghieu_request;
class Thuonghieu_Controller extends Controller
{
    public function addthuonghieu(){
    	return view('admin.thuonghieu');
    }
    public function postthuonghieu(thuonghieu_request $request){
        $data = new thuonghieu_model();
        $data->thuonghieu_name = $request->tenthuonghieu;
        $data->thuonghieu_mota = $request->mota;
        $data->thuonghieu_status = $request->trangthai;
        $data->save();
       	return redirect('admin/thuonghieu/them')->with(['messige'=>'Success!Thêm thương hiệu thành công.','alert'=>'alert-successg']);
    }
    public function showthuonghieu(){
    	$data = thuonghieu_model::orderby('id','desc')->get();
    	return view('admin.show_thuonghieu',['data'=>$data]);
    }
     public function un_active($a){
        $data = thuonghieu_model::find($a);
        $data->thuonghieu_status = 1;
        $data->save();
        return redirect('admin/thuonghieu')->with(['messige'=>'Success!Thay đổi trạng thái thành công.','alert'=>'alert-successg']);
    }
    public function active($a){
        $data = thuonghieu_model::find($a);
        $data->thuonghieu_status = 0;
        $data->save();
        return redirect('admin/thuonghieu')->with(['messige'=>'Success!Thay đổi trạng thái thành công.','alert'=>'alert-successg']);
    }
    public function suathuonghieu($n){
        $data = thuonghieu_model::find($n);
        return view('admin.edit_thuonghieu',['data'=>$data]);
    }
    public function postthieu(Request $request, $a){
        $data = thuonghieu_model::find($a);
        $data->thuonghieu_name = $request->tenthuonghieu;
        $data->thuonghieu_mota = $request->mota;
        $data->save();
        return redirect('admin/thuonghieu')->with(['messige'=>'Success!Sửa thương hiệu thành công.','alert'=>'alert-successg']);
    }
    public function xoa($id){
        $data = thuonghieu_model::find($id);
        $data->delete($id);
        return redirect('admin/thuonghieu')->with(['messige'=>'Success!Xóa thành công.','alert'=>'alert-successg']);;
    }
    //index

    public function thuonghieusanpham($id){
        $category = category_model::where('category_status',1)->orderby('id','desc')->get();
        $thuonghieu = thuonghieu_model::where('thuonghieu_status',1)->orderby('id','desc')->get();
        $data = sanpham_model::where('thuonghieu_id',$id)->where('sanpham_status',1)->get();
        $data1 = thuonghieu_model::find($id);
        return view('pages.thuonghieu_sanpham.thuonghieu_sanpham')->with(['data'=>$data,'category'=>$category,'thuonghieu'=>$thuonghieu,'data1'=>$data1]);
    }
}
