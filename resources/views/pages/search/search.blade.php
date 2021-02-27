@extends('layout_sanpham')
@section('trangchu')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">kết quả tìm kiếm</h2>
    @if($data->count()>0)
        @foreach($data as $value)
        <a href="{{url('chi-tiet-san-pham/'.$value->id)}}">
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                            <div class="productinfo text-center">
                                 <form>
                                    @csrf
                                    <input type="hidden" value="{{$value->id}}" class="product_id_{{$value->id}}">
                                    <input type="hidden" value="{{$value->sanpham_name}}" class="product_name_{{$value->id}}">
                                    <input type="hidden" value="{{$value->sanpham_gia}}" class="product_gia_{{$value->id}}">
                                    <input type="hidden" value="{{$value->sanpham_image}}" class="product_image_{{$value->id}}">
                                    <input type="hidden" value="1" class="soluong_{{$value->id}}">
                                    <a href="{{url('chi-tiet-san-pham/'.$value->id)}}">
                                        <div style="height:256px"><img src="{{url('public/upload/'.$value->sanpham_image)}}" alt="" /></div>
                                        <h2>{{number_format($value->sanpham_gia). 'đ'}}</h2>
                                        <p>{{$value->sanpham_name}}</p>
                                    </a>
                                    <button type="button" class="btn btn-default add-to-cart add-to-cart1 " data-id="{{$value->id}}" name="mua-hang"><i class="fa fa-shopping-cart"></i>Mua hàng</button>
                                </form>
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
    @else
        <h4 style="text-align: center; color:red">Không tìm thấy sản phẩm</h4>
    @endif
</div><!--features_items-->



@endsection