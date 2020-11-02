@extends('layout_admin')
@section('noidung_admin')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   cập nhập sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{url('admin/sanpham/postsanpham/'.$data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" value="{!! $data->sanpham_name !!}"class="form-control" name="tensanpham" id="exampleInputEmail1" placeholder="Ten danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                                <select name="danhmuc" class="form-control input-sm m-bot15">
                                    <option value="0">chọn danh mục</option>
                                    @foreach($danhmuc as $key => $value)
                                        @if($value->id == $data->category_id)
                                            <option selected value="{{$value->id}}">{!! $value->category_name !!}</option>
                                        @else
                                            <option  value="{{$value->id}}">{!! $value->category_name !!}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thương hiệu sản phẩm</label>
                                <select name="thuonghieu" class="form-control input-sm m-bot15">
                                    <option value="0">chọn thương hiệu</option>
                                    @foreach($thuonghieu as $key => $value1)
                                        @if($value1->id == $data->thuonghieu_id)
                                            <option selected value="{{$value1->id}}">{!! $value1->thuonghieu_name !!}</option>
                                        @else
                                            <option  value="{{$value1->id}}">{!! $value1->thuonghieu_name !!}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Giá</label>
                                <input type="text" value="{!! $data->sanpham_gia !!}" class="form-control" name="gia" id="exampleInputEmail1" placeholder="Ten danh mục">
                                <p class="error">{{$errors->first('gia')}}</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                                    <textarea rows ='5'type="text"class="form-control" name="mota" id="exampleInputEmail1" placeholder="Mô tả danh mục">{!! $data->sanpham_mota !!}
                                    </textarea>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung sản phẩm</label>
                                <textarea type="text" class="form-control" name="noidung" id="exampleInputEmail1" placeholder="Mô tả danh mục">
                                {!! $data->sanpham_noidung !!}
                                </textarea>
                            </div>
                            <div class="form-group" >
                                <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                                <input type="file" class="form-control" name="anh" id="exampleInputEmail1" placeholder="Ten danh mục">
                                <p><img style = "width: 50%"src="{{url('public/upload/'.$data->sanpham_image)}}" alt=""></p>
                            </div>
                            <button type="submit" class="btn btn-info">Cập nhập sản phẩm</button>
                    </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection