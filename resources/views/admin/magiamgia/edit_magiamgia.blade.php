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
                        <form role="form" action="{{url('admin/magiamgia/postma/'.$data->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                <input value="{{$data->coupon_name }}" type="text" class="form-control" name="tengiamgia" id="exampleInputEmail1" placeholder="Ten mã giảm giá">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã giảm giá</label>
                                <input value="{{$data->coupon_code }}" type="text" class="form-control" name="magiamgia" id="exampleInputEmail2" placeholder="Mã giảm giá">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số lượng</label>
                                 <input value="{{$data->coupon_sl }}" type="text" class="form-control" name="soluong" id="exampleInputEmail1" placeholder="số lượng">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Tính năng mã</label>
                                <select name="dieukien" class="form-control input-sm m-bot15">
                                    <option value="0">---chọn---</option>
                                    {{-- <option value="1">Giảm theo phần trăm</option>
                                    <option value="2">Giảm theo tiền</option> --}}
                                    @for($i=1;$i<3;$i++)
                                        @if($data->coupon_condition==$i)
                                            <option selected value="{{$i}}">
                                                @if($i==1)
                                                    {{'Giảm giá theo phần trăm'}}
                                                @elseif($i==2)
                                                    {{'Giảm giá theo tiền mặt'}}
                                                @endif
                                            </option>
                                        @else
                                            <option value="{{$i}}">
                                                @if($i==1)
                                                    {{'Giảm giá theo phần trăm'}}
                                                @elseif($i==2)
                                                    {{'Giảm giá theo tiền mặt'}}
                                                @endif
                                            </option>
                                        
                                        @endif
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nhập số % hoặc tiền giảm</label>
                                <input value="{{$data->coupon_number }}" type="text" class="form-control" name="tiengiam" id="exampleInputEmail1" placeholder="số lượng">
                            </div>
                            <button type="submit" name="add_coupon" class="btn btn-info">Thêm mã</button>
                    </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection