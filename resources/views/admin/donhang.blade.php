@extends('layout_admin')
@section('noidung_admin')
   <div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">
            ĐƠN HÀNG CỦA BẠN
        </div>
        @if (Session::has('messige'))
            <div id="alert1" class="{!! Session::get('alert') !!}" >
              {!! Session::get('messige') !!}
            </div>
        @endif 

        <div class="row w3-res-tb">
          <div class="col-sm-5 m-b-xs">
        

            <select class="input-sm form-control w-sm inline v-middle">
              <option value="0">Tên danh mục</option>
              <option value="1">Hiển thị</option>
              <option value="2">Ngày thêm</option>
            </select>
            <button class="btn btn-sm btn-default">Apply</button>                
          </div>
          <div class="col-sm-4">
          </div>
          <div class="col-sm-3">
            <div class="input-group">
              <input type="text" class="input-sm form-control" placeholder="Search">
              <span class="input-group-btn">
                <button class="btn btn-sm btn-default" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th style="width:20px;">
                  <label class="i-checks m-b-none">
                    <input type="checkbox"><i></i>
                  </label>
                </th>
                <th>Tên người đặt</th>
                <th>Tình trạng</th>
                <th>Tổng tiền</th>
                <th style="width:30px;"></th>
              </tr>
            </thead>
            <tbody>
          @foreach($data as $key => $value)
              <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox"><i></i></label></td>
                <td>{!! $value->shipping_order->shipping_name !!}</td>
                <td><span class="text-ellipsis">{!!$value->order_trangthai !!}</span></td>
                <td><span class="text-ellipsis">{!!$value->order_tongtien !!}</span></td>
                <td>
                    <a href="{{url('admin/order/chitiet_donhang/'.$value->id)}}" ui-toggle-class="">
                      <i class="fa fa-pencil-square-o text-success text-active"></i>
                    </a>
                    <a href="{{url('admin/order/delete_donhang/'.$value->id)}}" onclick="return confirm('bạn có muốn xóa không?')" ui-toggle-class="">
                      <i class="fa fa-times text-danger text"></i>
                    </a>
                </td>
              </tr>

          @endforeach
              
            </tbody>
          </table>
        </div>


        <footer class="panel-footer">
          <div class="row">
            
            <div class="col-sm-5 text-center">
              <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">                
              <ul class="pagination pagination-sm m-t-none m-b-none">
                <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                <li><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
              </ul>
            </div>
          </div>
        </footer>
      </div>
</div>
@endsection