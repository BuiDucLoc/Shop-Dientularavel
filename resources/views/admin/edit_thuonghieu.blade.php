@extends('layout_admin')
@section('noidung_admin')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Cập nhập thương hiệu
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{url('admin/thuonghieu/postthieu/'.$data->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" value="{!! $data->thuonghieu_name !!}"class="form-control" name="tenthuonghieu" id="exampleInputEmail1" placeholder="Ten danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả danh mục</label>
                                    <textarea rows ='5'type="text"class="form-control" name="mota" id="exampleInputEmail1" placeholder="Mô tả danh mục">{!! $data->thuonghieu_mota !!}
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-info">Cập nhập thương hiệu</button>
                    </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection