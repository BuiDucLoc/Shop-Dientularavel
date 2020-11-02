@extends('layout_admin')
@section('noidung_admin')
   <div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">
            THÔNG TIN NGƯỜI ĐẶT HÀNG
        </div>
        <div class="table-responsive">
          <table class="table table-striped b-t b-light" style="text-align: center">
            <thead>
              <tr class="hi">
                <th>Tên người đặt</th>
                <th>Số điện thoại</th>
                <th>Ngày đặt</th>
              </tr>
            </thead>
            <tbody>
         {{--  @foreach($data as $key => $value) --}}
              <tr style="text-align: center">
                <td>{!! $thongtin->shipping_order->customer_ship->customer_name !!}</td>
                <td><span class="text-ellipsis">{!!$thongtin->shipping_order->customer_ship->customer_phone !!}</span></td>
                <td><span class="text-ellipsis">{!! $thongtin->shipping_order->customer_ship->created_at !!}</span></td>
                
              </tr>

          {{-- @endforeach --}}
              
            </tbody>
          </table>
        </div>
       
      </div>
</div>

<br>
<div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">
            THÔNG TIN NGƯỜI NHẬN
        </div>
        <div class="table-responsive">
          <table class="table table-striped b-t b-light" style="text-align: center">
            <thead>
              <tr class="hi">
                <th>Tên người nhận</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Ghi chú</th>  
              </tr>
            </thead>
            <tbody>
         {{--  @foreach($data as $key => $value) --}}
              <tr style="text-align: center">
                <td>{!! $thongtin->shipping_order->shipping_name !!}</td>
                <td><span class="text-ellipsis">{!!$thongtin->shipping_order->shipping_phone !!}</span></td>
                <td><span class="text-ellipsis">{!! $thongtin->shipping_order->shipping_diachi !!}</span></td>
                <td><span class="text-ellipsis">{!! $thongtin->shipping_order->shipping_ghichu !!}</span></td>
                
              </tr>

          {{-- @endforeach --}}
              
            </tbody>
          </table>
        </div>
       
      </div>
</div>
<br>
<div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">
            CHI TIẾT ĐƠN HÀNG
        </div>
        <div class="table-responsive">
          <table class="table table-striped b-t b-light" style="text-align: center">
            <thead>
              <tr class="hi">
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng Tiền</th>  
              </tr>
            </thead>
            <tbody>
            @php
              $a = 0;
            @endphp
            @foreach($data as $value)
              <tr style="text-align: center">
                <td>{!! $value->sanpham_orderdetail->sanpham_name !!}</td>
                <td><span class="text-ellipsis">{!!$value->detal_sl !!}</span></td>
                <td><span class="text-ellipsis">{!! number_format($value->detal_gia).'đ' !!}</span></td>
                <td><span class="text-ellipsis">{!! number_format($value->detal_sl*$value->detal_gia).'đ' !!}</span></td>
              </tr>
              @php
                $a = $a + $value->detal_sl*$value->detal_gia;
              @endphp
            @endforeach 
            <tr>
              <td colspan="4" style="color:red">Tổng Tiền:{{number_format($a)}}</td>
            </tr>             
            </tbody>
          </table>
        </div>
       
      </div>
</div>
@endsection