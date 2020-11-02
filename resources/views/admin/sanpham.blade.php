@extends('layout_admin')
@section('noidung_admin')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <div class="panel-body">

                    @if (Session::has('messige'))
                        <div id="alert1" class="{!! Session::get('alert') !!}" >
                            {!! Session::get('messige') !!}
                        </div>
                    @endif

                    <div class="position-center">
                        <form role="form" action="{{'postspham'}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="tensanpham" id="exampleInputEmail1" placeholder="Ten danh mục">
                                <p class="error">{{$errors->first('tensanpham')}}</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                                <select name="danhmuc" class="form-control input-sm m-bot15">
                                    <option value="0">chọn danh mục</option>
                                    @foreach($danhmuc as $key => $value)
                                        <option value="{!!$value->id!!}">{!! $value->category_name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thương hiệu sản phẩm</label>
                                <select name="thuonghieu" class="form-control input-sm m-bot15">
                                    <option value="0">chọn thương hiệu</option>
                                    @foreach($thuonghieu as $key => $value1)
                                        <option value="{{$value1->id}}">{!! $value1->thuonghieu_name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá</label>
                                <input type="text" class="form-control" name="gia" id="exampleInputEmail1" placeholder="Ten danh mục">
                                <p class="error">{{$errors->first('gia')}}</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                                <textarea rows ='5'type="text" class="form-control" name="mota" id="exampleInputEmail1" placeholder="Mô tả danh mục"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung sản phẩm</label>
                                <textarea rows ='5'type="text" class="form-control" name="noidung" id="exampleInputEmail1" placeholder="Mô tả danh mục"></textarea>
                            </div>
                            <div class="form-group" >
                                <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                                <input type="file" class="form-control" name="anh" id="exampleInputEmail1" placeholder="Ten danh mục">
                                <p class="error">{{$errors->first('anh')}}</p>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hiển thị</label>
                                <select name="trangthai" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiện</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Thêm sản phẩm</button>
                    </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection