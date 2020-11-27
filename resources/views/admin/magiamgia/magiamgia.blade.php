@extends('layout_admin')
@section('noidung_admin')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Mã giảm giá
                </header>
                <div class="panel-body">
                {{-- //thongbao --}}
                    @if (Session::has('messige'))
                        <div id="alert1" class="{!! Session::get('alert') !!}" >
                            {!! Session::get('messige') !!}
                        </div>
                    @endif
                    <div class="position-center">
                        <form role="form" action="{{'postmagiamgia'}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                <input type="text" class="form-control" name="tengiamgia" id="exampleInputEmail1" placeholder="Ten mã giảm giá">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã giảm giá</label>
                                <input type="text" class="form-control" name="magiamgia" id="exampleInputEmail2" placeholder="Mã giảm giá">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số lượng</label>
                                 <input type="text" class="form-control" name="soluong" id="exampleInputEmail1" placeholder="số lượng">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Tính năng mã</label>
                                <select name="dieukien" class="form-control input-sm m-bot15">
                                    <option value="0">---chọn---</option>
                                    <option value="1">Giảm theo phần trăm</option>
                                    <option value="2">Giảm theo tiền</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nhập số % hoặc tiền giảm</label>
                                <input type="text" class="form-control" name="tiengiam" id="exampleInputEmail1" placeholder="số lượng">
                            </div>
                            <button type="submit" name="add_coupon" class="btn btn-info">Thêm mã</button>
                    </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection