@extends('layout_admin')
@section('noidung_admin')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Phí vận chuyển
                </header>
                <div class="panel-body">
                {{-- //thongbao --}}
                    @if (Session::has('messige'))
                        <div id="alert1" class="{!! Session::get('alert') !!}" >
                            {!! Session::get('messige') !!}
                        </div>
                    @endif
                    <div class="position-center">
                        <form>
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Chọn thành phố</label>
                                <select name="city" id="city" class="form-control input-sm m-bot15 choice city">
                                    <option value="0">---Chọn thành phố---</option>
                                    @foreach($city as $value)
                                        <option value="{{$value->matp}}">{{$value->name_city}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Chọn quận huyện</label>
                                <select name="qh_province" id="qh_province" class="form-control input-sm m-bot15 choice qh_province">
                                    <option value="0">---Chọn quận huyện---</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Chọn xã phường</label>
                                <select name="xp_wards" id="xp_wards" class="form-control input-sm m-bot15 xp_wards">
                                    <option value="0">---Chọn xã phường---</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phí vận chuyển</label>
                                <input type="text" class="form-control fee_ship" name="fee_ship" id="fee_ship" placeholder="Ten danh mục">
                            </div>
                            <button type="button" class="btn btn-info add_delivery">Thêm phí vận chuyển</button>
                    </form>
                    </div>
                    <br>
                    <div id="load_delivery">
                            
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection