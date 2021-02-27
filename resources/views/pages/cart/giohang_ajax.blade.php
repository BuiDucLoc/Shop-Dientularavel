@extends('layout_cart')
@section('trangchu')
<?php 
	$dl = Session::get('cart');
?>
	<section id="cart_items">
		{{-- <div class="container"> --}}
			<div class="breadcrumbs">
				<ol class="breadcrumb"style="margin-bottom: 0px!important">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
		@if(!isset($dl)||$dl==null)
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
				<form action="{{url('capnhap')}}" method="POST">
					@csrf
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
							@php $subtotal=0; @endphp
							@foreach($dl as $value)
							@php
								$subtotal +=$value['price'] * $value['qty'];
							@endphp
								<tr class="text-center">
									<td class="cart_product col-sm-2">
										<a href=""><img width="100%" src="{{url('public/upload/'.$value['image'])}}" alt=""></a>
									</td>
									<td class="cart_description">
										<h5><a href="">{{$value['name']}}</a></h5>
										<p>ID: {{$value['id']}}</p>
									</td>
									<td class="cart_price">
										<p>{{number_format($value['price']).'đ'}}</p>
									</td>
									<td class="cart_quantity col-sm-2">
										<div class="cart_quantity_button">
											<input class="cart_quantity_input" style="float: none!important;width: 35%;" type="number" name="soluong[{{$value['id']}}]" value="{{$value['qty']}}" autocomplete="off" size="5">

											{{-- <input class="qty" type="hidden" value="{{$value->rowId}}" name="row_id">//cart_session --}}
											
										
										</div>
									</td>
									<td class="cart_total">
										<p class="">{{number_format($value['price'] * $value['qty']).'đ'}}</p>
									</td>
									<td class="cart_delete">
										<a class="cart_quantity_delete" href="{{url('delete_giohang/'.$value['id'])}}"><i class="fa fa-times"></i></a>
									</td>

								</tr>
							@endforeach	

							<tr>
								<td colspan="4" style="text-align: center">
									Giỏ hàng hiện đang có:{{count($dl)}} sản phẩm
								</td>
								<td>
									<input class="btn btn-default update left capnhap" id="{{-- {{$value->rowId}} --}}" type="submit" value="Cập nhập" name="capnhap">
								</td>
								<td style="text-align: center">
									<a class="btn btn-default update left" href="{{url('delete_all')}}">Xóa Tất cả</a>
								</td>
							</tr>
							
						</tbody>
					</table>
				</form>
			</div>
		{{-- </div> --}}
	</section> <!--/#cart_items-->

	@if(Session::has('user_id'))
	<section id="do_action" style="margin-bottom: 0px!important;">
		<div class="container-fluid">
			<div class="heading">
				<h3>Kiểm tra lại thông tin đặt hàng và mã giảm giá</h3>
				
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="total_area" style="margin-bottom: 20px!important;">
							<ul>
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
		                            <input type="button" class="btn btn-primary van_chuyen" value="Tính phí vận chuyển">
		                   		 </form>
		                   		 <br>
							<form {{-- action="{{url('check_giamgia')}}" method="POST" --}}>
								@csrf
								@if(Session::get('coupon'))
									@foreach(Session::get('coupon') as $value)
									@endforeach
								@endif
								<input type="text" value="@php if(Session::get('coupon')){ echo $value['coupon_code'];} @endphp" name="ma" placeholder="Nhập mã giảm giá" class="ma">
								<input class="btn btn-default update1 check" type="button" value="Check" name="check">
									@if(Session::get('coupon'))
										{{-- <a href="{{url('delete_giamgia')}}" class="btn btn-default update1">Xóa mã giảm giá</a> --}}
										<input class="btn btn-default update1 delete" type="button" value="Xóa mã giảm giá" name="delete">
									@endif
							</form>
								<li>Tổng <span>{{number_format($subtotal). 'đ'}}</span></li>
								<li style="color: red">Mã giảm giá:
										@if(Session::get('coupon'))
											@foreach(Session::get('coupon') as $value)
												@if($value['coupon_condition']==1)
													<span>{{$value['coupon_number']}} % </span>
												@elseif($value['coupon_condition']==2)
													<span>{{number_format($value['coupon_number'])}}.đ</span>
												@endif
											@endforeach
										@endif
								</li>
								<li>
									Phí vận chuyển 
									<span >
										@if(Session::get('fee_ship'))
											{{number_format(Session::get('fee_ship'),0,',','.')}}đ
											{{-- <a class="cart_quantity_delete" href="{{url('delete_vanchuyen')}}"><i class="fa fa-times"></i></a> --}}
											<button class="delete_vanchuyen"><i class="fa fa-times" style="color: red!important;"></i></button>
										@else
											0.đ
										@endif
									</span>
								</li>
								<li>
									Thành Tiền
									 @if(Session::get('coupon'))
											@foreach(Session::get('coupon') as $value)
												@if($value['coupon_condition']==1)
													<span>
														@php
															$a = Session::get('fee_ship');
															$sogiam = ($subtotal * $value['coupon_number'])/100;
															$tong = $subtotal-$sogiam + $a;
														@endphp
														{{number_format($tong)}} .đ
													</span>
												@elseif($value['coupon_condition']==2)
													<span>
														@php
															$a = Session::get('fee_ship');
															$tong = $subtotal - $value['coupon_number']+$a;
														@endphp
														{{number_format($tong)}} .đ
													</span>
												@endif
											@endforeach
										@else
											@php
												$a = Session::get('fee_ship');
											@endphp
											<span>{{number_format($subtotal+$a). 'đ'}}</span>
										@endif
								</li>
							</ul>
							{{-- @if(Session::has('user_id')&&Session::has('shipping_id'))
								<a class="btn btn-default update left" href="{{url('thanhtoan')}}">Thanh Toán</a>
							@elseif(Session::has('user_id'))
								<a class="btn btn-default update left" href="{{url('thongtin_donhang')}}">Thanh Toán</a>
							@else
								<a class="btn btn-default update left" href="{{url('user_login')}}">Thanh Toán</a>
							@endif --}}


							
					
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
	@else
	@endif
		@if(Session::has('user_id'))
			<a style="margin-bottom: 40px" class="btn btn-default update left" href="{{url('thongtin_donhang')}}">Thanh Toán</a>
			@else
				<a style="margin-bottom: 40px" class="btn btn-default update left" href="{{url('user_login')}}">Thanh Toán</a>
			@endif
@endif

@endsection