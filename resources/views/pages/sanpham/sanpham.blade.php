@extends('layout_sanpham')
@section('trangchu')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Tất Cả sản phẩm</h2>

    @foreach($sanpham as $value)
    <a href="{{url('chi-tiet-san-pham/'.$value->id)}}">
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                            <div style="height:256px"><img src="{{url('public/upload/'.$value->sanpham_image)}}" alt="" /></div>
                            <h2>{{number_format($value->sanpham_gia). 'đ'}}</h2>
                            <p>{{$value->sanpham_name}}</p>
                            <a href="{{url('them_gh/'.$value->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div><!--features_items-->
          <div class="row">
            <div class="col-sm-5 text-center">
              <small class="text-muted inline m-t-sm m-b-sm">Tổng có {{count($data)}} sản phẩm</small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">                
              <ul class="pagination pagination-sm m-t-none m-b-none">
                <li><a href="{{$sanpham->url($sanpham->currentPage()-1)}}"><i class="fa fa-chevron-left"></i></a></li>
               @for($i =1;$i<=$sanpham->lastPage();$i++)
                  <li class="{{($sanpham->currentPage() == $i) ? 'active' : ''}}">
                    <a href="{{url('sanpham?page='.$i)}}">{{$i}}</a>
                  </li>
                @endfor
                <li><a href="{{$sanpham->url($sanpham->currentPage()+1)}}"><i class="fa fa-chevron-right"></i></a></li>
              </ul>
            </div>
          </div>
@endsection