@include('pages.block.menu');
<?php 
	$dl = Session::get('cart');
?>
	<section id="cart_items">
		<div class="container">
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
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 clearfix">
						<div class="table-responsive cart_info">
							<form action="{{url('capnhap1')}}" method="POST">
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
														<input class="cart_quantity_input" style="float: none!important" type="" name="soluong[{{$value['id']}}]" value="{{$value['qty']}}" autocomplete="off" size="2">

														{{-- <input class="qty" type="hidden" value="{{$value->rowId}}" name="row_id">//cart_session --}}
														
													
													</div>
												</td>
												<td class="cart_total">
													<p class="">{{number_format($value['price'] * $value['qty']).'đ'}}</p>
												</td>
												<td class="cart_delete">
													<a class="cart_quantity_delete" href="{{url('delete_giohang1/'.$value['id'])}}"><i class="fa fa-times"></i></a>
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
												<a class="btn btn-default update left" href="{{url('delete_all1')}}">Xóa Tất cả</a>
											</td>
										</tr>
										
									</tbody>
								</table>
							</form>
						</div>
					</div>

					<div class="col-sm-12" >
						<div class="bill-to">
							<p>Thông tin đặt hàng</p>
							<div class="form-one"style="width: 100%!important">
								<form >
									@csrf
									@foreach($data as $value)
										<input type="email" placeholder="Email*" name="email" class="email" value="{{$value->customer_email}}">
										<input type="text" placeholder="Tên người mua *"name="ten" class="ten" value="{{$value->customer_name}}">
										<input type="text" placeholder="Số điện thoại *"name="sdt" class="sdt" value="{{$value->customer_phone}}">
										<input type="text" placeholder="Địa chỉ*"name="diachi" class="diachi">
										<p>Ghi chú đơn hàng của bạn</p>
										<textarea style="height:100px!important"name="ghichu" class="ghichu"  placeholder="Ghi chú" rows="8"></textarea>
										
									@endforeach
										@if(Session::get('fee_ship'))
											<input type="hidden" placeholder=""name="fee_ship" class="fee_ship" value="{{Session::get('fee_ship')}}">
										@else
											<input type="hidden" placeholder=""name="fee_ship" class="fee_ship" value="0">
										@endif

										@if(Session::get('coupon'))
											@foreach(Session::get('coupon') as $value)
												<input type="hidden" placeholder=""name="coupon" class="coupon" value="
													@if($value['coupon_condition']==1)
														@php
															$a = Session::get('fee_ship');
															$sogiam = ($subtotal * $value['coupon_number'])/100;
														@endphp
														{{$sogiam}}
													@elseif($value['coupon_condition']==2)
														{{($value['coupon_number'])}}
													@endif
												">
											@endforeach
										@else
												<input type="hidden" placeholder=""name="coupon" class="coupon" value="0">
										@endif

										<input type="hidden" placeholder=""name="tong" class="tong" value="
											@if(Session::get('coupon'))
											@foreach(Session::get('coupon') as $value)
												@if($value['coupon_condition']==1)
														@php
															$a = Session::get('fee_ship');
															$sogiam = ($subtotal * $value['coupon_number'])/100;
															$tong = $subtotal - $sogiam+$a;
														@endphp
														{{($tong)}}
												@elseif($value['coupon_condition']==2)
														@php
															$a = Session::get('fee_ship');
															$tong = $subtotal - $value['coupon_number'] + $a;
														@endphp
														{{($tong)}}
												@endif
											@endforeach
										@else
											@php
												$a = Session::get('fee_ship');
											@endphp
											{{($subtotal+$a)}}
										@endif
										">
										<div class="form-group">
			                                <label for="exampleInputEmail1">Chọn hình thức thanh toán</label>
				                                <select name="ht_thanhtoan" id="xp_wards" class="form-control input-sm m-bot15 ht_thanhtoan">
				                                    <option value="1">---Chuyển khoản---</option>
				                                    <option value="2">---Thanh toán tiền mặt---</option>
				                                </select>
		                            	</div>
		                            <input type="button" class="btn btn-primary send_order" value="Xác nhận đơn hàng">
								</form>

								
								
							</div>
							
						</div>
					</div>
				</div>
			</div>



		<section id="do_action">
		<div class="container-fluid">
			<div class="heading">
				<h3>Kiểm tra lại thông tin đặt hàng và mã giảm giá</h3>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="total_area">
							<ul>
							<form action="{{url('check_giamgia')}}" method="POST">
								@csrf
								@if(Session::get('coupon'))
									@foreach(Session::get('coupon') as $value)
									@endforeach
								@endif
								{{-- <input type="text" value="@php if(Session::get('coupon')){ echo $value['coupon_code'];} @endphp" name="ma" placeholder="Nhập mã giảm giá"> --}}
								{{-- <input class="btn btn-default update1" type="submit" value="Check" name="check"> --}}
									{{-- @if(Session::get('coupon'))
										<a href="{{url('delete_giamgia')}}" class="btn btn-default update1">Xóa mã giảm giá</a>
									@endif --}}
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
									<span>
										@if(Session::get('fee_ship'))
											{{number_format(Session::get('fee_ship'),0,',','.')}}đ
										{{-- <a class="cart_quantity_delete" href="{{url('delete_vanchuyen')}}"><i class="fa fa-times"></i></a> --}}
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
															$tong = $subtotal - $sogiam+$a;
														@endphp
														{{number_format($tong)}} .đ
													</span>
												@elseif($value['coupon_condition']==2)
													<span>
														@php
															$a = Session::get('fee_ship');
															$tong = $subtotal - $value['coupon_number'] + $a;
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
							<a class="btn btn-default update left" href="{{url('giohang')}}">Sửa</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endif
		</div>
	</section> <!--/#cart_items-->
@include('pages.block.footer');
