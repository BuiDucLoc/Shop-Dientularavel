@extends('layout_admin')
@section('noidung_admin')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Cập nhập danh mục sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{url('admin/danhmucsanpham/postdmuc/'.$data->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" value="{!! $data->category_name !!}"class="form-control" name="tendanhmuc" id="exampleInputEmail1" placeholder="Ten danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả danh mục</label>
                                    <textarea rows ='5'type="text"class="form-control" name="mota" id="exampleInputEmail1" placeholder="Mô tả danh mục">{!! $data->category_mota !!}
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-info">Cập nhập danh mục</button>
                    </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection