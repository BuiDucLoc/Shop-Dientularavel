@extends('layout_admin')
@section('noidung_admin')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thương hiệu sản phẩm
                </header>
                <div class="panel-body">

                     @if (Session::has('messige'))
                        <div id="alert1" class="{!! Session::get('alert') !!}" >
                            {!! Session::get('messige') !!}
                        </div>
                     @endif 

                    <div class="position-center">
                        <form role="form" action="{{'postthuonghieu'}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <input type="text" class="form-control" name="tenthuonghieu" id="exampleInputEmail1" placeholder="Ten danh mục">
                                <p class="error">{{$errors->first('tenthuonghieu')}}</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả thương hiệu</label>
                                <textarea rows ='5'type="text" class="form-control" name="mota" id="exampleInputEmail1" placeholder="Mô tả danh mục"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hiển thị</label>
                                <select name="trangthai" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiện</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Thêm thương hiệu</button>
                    </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection