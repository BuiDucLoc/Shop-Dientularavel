<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\category_model;
use App\Models\sanpham_model;
use App\Models\thuonghieu_model;
use Session;
use App\Http\Requests\category_request;
class Category_Controller extends Controller
{
    //admin
    public function addcategory(){
    	return view('admin.category');
    }
    public function showcategory(){
    	$data = category_model::orderby('id','desc')->get();
    	return view('admin.show_category',['data'=>$data]);
    }
    public function postdanhmuc(category_request $request){
        $data = new category_model();
        $data->category_name = $request->tendanhmuc;
        $data->category_mota = $request->mota;
        $data->category_status = $request->trangthai;
        $data->save();
       	return redirect('admin/danhmucsanpham/them')->with(['messige'=>'Success!Thêm danh mục thành công.','alert'=>'alert-successg']);
    }
    public function un_active($a){
        $data = category_model::find($a);
        $data->category_status = 1;
        $data->save();
        return redirect('admin/danhmucsanpham')->with(['messige'=>'Success!Thay đổi trạng thái thành công.','alert'=>'alert-successg']);
    }
    public function active($a){
        $data = category_model::find($a);
        $data->category_status = 0;
        $data->save();
        return redirect('admin/danhmucsanpham')->with(['messige'=>'Success!Thay đổi trạng thái thành công.','alert'=>'alert-successg']);
    }
    public function suadanhmuc($n){
        $data = category_model::find($n);
        return view('admin.edit_category',['data'=>$data]);
    }
    public function postdmuc(Request $request, $a){
        $data = category_model::find($a);
        $data->category_name = $request->tendanhmuc;
        $data->category_mota = $request->mota;
        $data->save();
        return redirect('admin/danhmucsanpham')->with(['messige'=>'Success!Sửa Thành công.','alert'=>'alert-successg']);
    }
    public function xoa($id){
        $data = category_model::find($id);
        $data->delete($id);
        return redirect('admin/danhmucsanpham')->with(['messige'=>'Success!Xóa thành công.','alert'=>'alert-successg']);
    }

    //tranglayout
    public function danhmucsanpham($id){
        $category = category_model::where('category_status',1)->orderby('id','desc')->get();
        $thuonghieu = thuonghieu_model::where('thuonghieu_status',1)->orderby('id','desc')->get();
        $data = sanpham_model::where('category_id',$id)->where('sanpham_status',1)->get();
        $data1 = category_model::find($id);
        return view('pages.danhmuc_sanpham.sanpham')->with(['data'=>$data,'category'=>$category,'thuonghieu'=>$thuonghieu,'data1'=>$data1]);
    }
}
