<?php 
  use Carbon\Carbon;
?>
@extends('layout_admin')
@section('noidung_admin')
   <div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách sản phẩm
        </div>
        
        @if (Session::has('messige'))
            <div id="alert1" class="{!! Session::get('alert') !!}" >
              {!! Session::get('messige') !!}
            </div>
        @endif 

        <div class="row w3-res-tb">
          <div class="col-sm-5 m-b-xs">
        

            <select class="input-sm form-control w-sm inline v-middle" id="danhmuc">
              <option checked="" value="">Chọn danh mục</option>
              @foreach($category as $cate)
                 <option value="{{$cate->id}}">{{ $cate->category_name}}</option>
              @endforeach
            </select>
                           
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
          <table class="table table-striped b-t b-light" >
            <thead>
              <tr>
                <th style="width:20px;">
                  <label class="i-checks m-b-none">
                    <input type="checkbox"><i></i>
                  </label>
                </th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Danh mục</th>
                <th>Thương hiệu</th>
                <th>Hiển thị</th>
                <th style="width:30px;"></th>
              </tr>
            </thead>
            <tbody id="sanpham">
          @foreach($data as $key => $value)
              <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{!! $value->sanpham_name !!}</td>
                <td style="width: 14%"><img src="{{url('public/upload/'.$value->sanpham_image)}}" style="width: 50%"alt=""></td>
                <td>{!! number_format($value->sanpham_gia) !!}</td>
                <td>{!! $value->category_sp->category_name !!}</td>
                <td>{!! $value->thuonghieu_sp->thuonghieu_name !!}</td>
                <td><span class="text-ellipsis">
                          {{-- {!! $value->category_status !!} --}}
                          
                            @if($value->sanpham_status ==0)
                                <a href="{{url('admin/sanpham/un_active/'.$value->id)}}"><span class="fa fa-thumbs-down">Ẩn</span></a>
                            @else
                                <a href="{{url('admin/sanpham/active/'.$value->id)}}"><span class="fa fa-thumbs-up">Hiển thị</span></a>
                             
                            @endif

                    </span>
                </td>
                <td><span class="text-ellipsis">
                  @php
                    $dt = new Carbon($value->created_at);
                    echo $dt->toDateString();  
                  @endphp
                </span></td>
                <td>
                    <a href="{{url('admin/sanpham/sua/'.$value->id)}}" ui-toggle-class="">
                      <i class="fa fa-pencil-square-o text-success text-active"></i>
                    </a>
                    <a href="{{url('admin/sanpham/xoa/'.$value->id)}}" onclick="return confirm('bạn có muốn xóa không?')" ui-toggle-class="">
                      <i class="fa fa-times text-danger text"></i>
                    </a>
                </td>
              </tr>
          @endforeach
              
            </tbody>
          </table>
        </div>
        {{-- {{$data->links()}} --}}
        <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-5 text-center">
              <small class="text-muted inline m-t-sm m-b-sm">Tổng có {{count($data1)}} sản phẩm</small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">                
              <ul class="pagination pagination-sm m-t-none m-b-none">
                <li><a href="{{$data->url($data->currentPage()-1 )}}"><i class="fa fa-chevron-left"></i></a></li>
                @for($i =1;$i<= $data->lastPage();$i++)
                  <li class="{{($data->currentPage() == $i) ? 'active' : ''}}">
                    <a href="{{$data->url($i)}}">{{$i}}</a>
                  </li>
                @endfor
                <li><a href="{{$data->url($data->currentPage()+1 )}}"><i class="fa fa-chevron-right"></i></a></li>
              </ul>
            </div>
          </div>
        </footer>
      </div>
</div>

<script>
  $(document).ready(function(){
      $("#danhmuc").change(function(){
        var idtheloai = $(this).val();
        $.get("ajax/danhmuc/" + idtheloai,function(data){
            // alert(data);
            $("#sanpham").html(data);
        });
      });
  });
</script>
@endsection