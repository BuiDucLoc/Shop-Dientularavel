@extends('layout_cart')
@section('trangchu')
<?php 
	$dl = Cart::content();
?>
	<section id="cart_items">
		{{-- <div class="container"> --}}
			<div class="breadcrumbs">
				<ol class="breadcrumb"style="margin-bottom: 0px!important">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
		@if(count($dl) < 1)
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu text-center">
							<td class="image">Ảnh</td>
							<td class="description">Tên</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng Giá</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<tr class="text-center">
							<td colspan="5">
								<img style="width:25%" src="{{url('public/upload/cart.png')}}" alt="">
								<p>Giỏ hàng rỗng(0 sản phẩm)</p>
							</td>
						</tr>
						<tr class="text-center">
							<td colspan="5">
								<a class="btn btn-default update left" href="{{url('sanpham')}}">Tiếp tục mua hàng</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

		@else
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu text-center">
							<td class="image">Ảnh</td>
							<td class="description">Tên</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng Giá</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($dl as $value)
							<tr class="text-center">
								<td class="cart_product col-sm-2">
									<a href=""><img width="100%" src="{{url('public/upload/'.$value->options->image)}}" alt=""></a>
								</td>
								<td class="cart_description">
									<h5><a href="">{{$value->name}}</a></h5>
									<p>ID: {{$value->id}}</p>
								</td>
								<td class="cart_price">
									<p>{{number_format($value->price).'đ'}}</p>
								</td>
								<td class="cart_quantity col-sm-2">
									<div class="cart_quantity_button">
									<form action="{{url('capnhap')}}" method="POST">
										@csrf
										<input class="cart_quantity_input" style="float: none!important" type="" name="soluong" value="{{$value->qty}}" autocomplete="off" size="2">

										<input class="qty" type="hidden" value="{{$value->rowId}}" name="row_id">
										<input class="capnhap" id="{{$value->rowId}}" type="submit" value="Cập nhập" name="capnhap">
									</form>
									</div>
								</td>
								<td class="cart_total">
									<p class="">{{number_format($value->price * $value->qty).'đ'}}</p>
								</td>
								<td class="cart_delete">
									<a class="cart_quantity_delete" href="{{url('delete_giohang/'.$value->rowId)}}"><i class="fa fa-times"></i></a>
								</td>
							</tr>
						@endforeach	

						<tr>
							<td colspan="4" style="text-align: center">
								Giỏ hàng hiện đang có:{{Cart::count()}} sản phẩm
							</td>
							<td style="text-align: center">
								<a class="btn btn-default update left" href="{{url('delete_all')}}">Xóa Tất cả</a>
							</td>
						</tr>
						
					</tbody>
				</table>
			</div>
		{{-- </div> --}}
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container-fluid">
			<div class="heading">
				<h3>Kiểm tra lại thông tin đặt hàng và mã giảm giá</h3>
				
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="total_area">
						<ul>
							<li>Tổng <span>{{Cart::subtotal().'vnđ'}}</span></li>
							<li>Thuế<span>{{Cart::tax().'vnđ'}}</span></li>
							<li>Phí vận chuyển <span>Free</span></li>
							<li>Thành Tiền <span>{{Cart::subtotal().'vnđ'}}</span></li>
						</ul>
						@if(Session::has('user_id')&&Session::has('shipping_id'))
							<a class="btn btn-default update left" href="{{url('thanhtoan')}}">Thanh Toán</a>
						@elseif(Session::has('user_id'))
							<a class="btn btn-default update left" href="{{url('thongtin_donhang')}}">Thanh Toán</a>
						@else
							<a class="btn btn-default update left" href="{{url('user_login')}}">Thanh Toán</a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
	@endif

@endsection