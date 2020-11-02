<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\thuonghieu_model;
use App\Models\sanpham_model;
use App\Models\category_model;
use Session;
use File;
use App\Http\Requests\sanpham_request;
class Sanpham_Controller extends Controller
{
     public function addsanpham(){
     	$danhmuc = category_model::orderby('id','desc')->get();
     	$thuonghieu = thuonghieu_model::orderby('id','desc')->get();
    	return view('admin.sanpham',['danhmuc'=>$danhmuc,'thuonghieu'=>$thuonghieu]);
    }
    public function postspham(sanpham_request $request){
    	$image = $request->file('anh');
        $luu = $image->getClientOriginalName();
    	if ($image) {
    		$data = new sanpham_model();
    		$data->category_id = $request->danhmuc;
    		$data->thuonghieu_id = $request->thuonghieu;
    		$data->sanpham_name = $request->tensanpham;
    		$data->sanpham_mota = $request->mota;
    		$data->sanpham_noidung = $request->noidung;
    		$data->sanpham_gia = $request->gia;
    		$data->sanpham_status = $request->trangthai;
    		
    		$image->move('public/upload',$luu);
    		$data->sanpham_image = $luu;
    		$data->save();
    		return redirect('admin/sanpham/them')->with(['messige'=>'Success!Thêm sản phẩm thành công.','alert'=>'alert-successg']);
    	}
    	else{
    		return redirect('admin/sanpham/them')->with(['messige'=>'Danger!Thêm sản phẩm thất bại.','alert'=>'alert-danger']);
    	}
    }
    public function showsanpham(){
        $data = sanpham_model::orderby('id','desc')->paginate(5);
        $data1 = sanpham_model::all();
        $category = category_model::all();
        return view('admin.show_sanpham',['data'=>$data,'data1'=>$data1,'category'=>$category]);
    }
    public function un_active($a){
        $data = sanpham_model::find($a);
        $data->sanpham_status = 1;
        $data->save();
        return redirect('admin/sanpham')->with(['messige'=>'Success!Thay đổi trạng thái thành công.','alert'=>'alert-successg']);
    }
    public function active($a){
        $data = sanpham_model::find($a);
        $data->sanpham_status = 0;
        $data->save();
        return redirect('admin/sanpham')->with(['messige'=>'Success!Thay đổi trạng thái thành công.','alert'=>'alert-successg']);
    }
     public function suasanpham($n){
        $data = sanpham_model::find($n);
        $danhmuc = category_model::orderby('id','desc')->get();
        $thuonghieu = thuonghieu_model::orderby('id','desc')->get();
        return view('admin.edit_sanpham',['data'=>$data,'danhmuc'=>$danhmuc,'thuonghieu'=>$thuonghieu]);
    }
    public function postsanpham(sanpham_request $request, $a){
        $data = sanpham_model::find($a);
        $a = $data->sanpham_image;
        $data->category_id = $request->danhmuc;
        $data->thuonghieu_id = $request->thuonghieu;
        $data->sanpham_name = $request->tensanpham;
        $data->sanpham_mota = $request->mota;
        $data->sanpham_noidung = $request->noidung;
        $data->sanpham_gia = $request->gia;
        $image = $request->file('anh');
        if($image){
            File::delete('public/upload/'.$a);
            $luu = $image->getClientOriginalName();
            $image->move('public/upload',$luu);
            $data->sanpham_image = $luu;
            $data->save();
            return redirect('admin/sanpham')->with(['messige'=>'Success!Sửa thương hiệu thành công.','alert'=>'alert-successg']);
            }
        else
        {   
            $data->save();
            return redirect('admin/sanpham')->with(['messige'=>'Success!Sửa thương hiệu thành công.','alert'=>'alert-successg']);
        }
    }
    public function xoa($id){
        $data = sanpham_model::find($id);
        $image = $data->sanpham_image;
        File::delete('public/upload/'.$image);
        $data->delete($id);
        return redirect('admin/sanpham')->with(['messige'=>'Success!Xóa thành công.','alert'=>'alert-successg']);
    }

    //index-layout

    public function chitietsanpham($id){
        $category = category_model::where('category_status',1)->orderby('id','desc')->get();
        $thuonghieu = thuonghieu_model::where('thuonghieu_status',1)->orderby('id','desc')->get();
        $detail_sanpham = sanpham_model::where('id',$id)->get();
        foreach ($detail_sanpham as $key => $value) {
            $cate = $value->category_id;
        }
        $splienquan = sanpham_model::where('category_id',$cate)->whereNotIn('id',[$id])->limit(3)->get();
        
        return view('pages.chitietsanpham.chitietsanpham')->with(['category'=>$category,'thuonghieu'=>$thuonghieu,'detail_sanpham'=>$detail_sanpham,'splienquan'=>$splienquan]);
    }
    public function sanpham(){
        $category = category_model::where('category_status',1)->orderby('id','desc')->get();
        $thuonghieu = thuonghieu_model::where('thuonghieu_status',1)->orderby('id','desc')->get();
        $data = sanpham_model::paginate(6);
        $data1 = sanpham_model::all();
        return view('pages.sanpham.sanpham')->with(['category'=>$category,'thuonghieu'=>$thuonghieu,'sanpham'=>$data,'data'=>$data1]);
    }
       
}
