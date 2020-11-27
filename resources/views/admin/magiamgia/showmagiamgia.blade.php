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
                <th>Tên mã giảm giá</th>
                <th>Mã giảm giá</th>
                <th>Số lượng</th>
                <th>Điều kiện</th>
                <th>Số tiền giảm</th>
                <th style="width:30px;"></th>
              </tr>
            </thead>
            <tbody>
          @foreach($data as $key => $value)
              <tr>
                <td>{!! $value->coupon_name !!}</td>
                <td>{!! $value->coupon_code !!}</td>
                <td><span class="text-ellipsis">{!!$value->coupon_sl !!}</span></td>
                <td>
                  <span class="text-ellipsis">
                    @if ($value->coupon_condition==1)
                      {{'Giảm giá theo phần trăm'}}
                    @elseif($value->coupon_condition==2)
                      {{'Giảm giá theo tiền mặt'}}
                    @endif
                  </span>
                </td>
                <td>
                  <span class="text-ellipsis">
                    @if ($value->coupon_condition==1)
                      Giảm{{$value->coupon_number}}%
                    @elseif($value->coupon_condition==2)
                      Giảm{{number_format($value->coupon_number)}}đ
                    @endif
                  </span>
                </td>
                <td>
                    <a href="{{url('admin/magiamgia/sua/'.$value->id)}}" ui-toggle-class="">
                      <i class="fa fa-pencil-square-o text-success text-active"></i>
                    </a>
                    <a href="{{url('admin/magiamgia/xoa/'.$value->id)}}" onclick="return confirm('bạn có muốn xóa không?')" ui-toggle-class="">
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