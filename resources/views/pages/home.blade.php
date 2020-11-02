@extends('layout')
@section('trangchu')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Sản phẩm mới nhất</h2>
    
    @foreach($allsanpham as $value)
    <a href="{{url('chi-tiet-san-pham/'.$value->id)}}">
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                        
                            <div style="height: 271px"><img src="{{url('public/upload/'.$value->sanpham_image)}}" alt="" /></div>
                            <h2>{{number_format($value->sanpham_gia). 'đ'}}</h2>
                            <p>{{$value->sanpham_name}}</p>
                            <a href="{{url('them_gh/'.$value->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                       
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



@endsection