{{-- @include('pages.block.menu')
<?php 
	$dl = Cart::content();
?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb" style="margin-bottom: 0px!important">
				  <li><a href="#">Home</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div><!--/breadcrums-->
			
			<div class="step-one">
				<h2 class="heading">Step2</h2>
			</div>
			
			
			<div class="register-req">
				<p>Vui lòng kiểm tra lại thông tin khi đặt hàng</p>
			</div><!--/register-req-->

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
			<div class="shopper-informations">
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
										<input class="cart_quantity_input" style="float: none!important" type="" name="soluong" value="{{$value->qty}}" autocomplete="off" size="2">
								</td>
								<td class="cart_total">
									<p class="">{{number_format($value->price * $value->qty).'đ'}}</p>
									<a href="{{url('giohang')}}">chỉnh sửa</a>
								</td>
								<td class="cart_delete">
									<a class="cart_quantity_delete" href="{{url('delete_giohang/'.$value->rowId)}}"><i class="fa fa-times"></i></a>
								</td>
							</tr>
						@endforeach	
					</tbody>
				</table>
			</div>
					
			</div>
			<h4 style="margin-bottom: 50px!important">Chọn hình thức thanh toán</h4>
			<form action="{{url('hinhthucthanhtoan')}}" method = "POST">
				@csrf
				<div class="payment-options">
					<span>
						<label><input name="hinhthuc" value="1" type="radio">Thanh toán ATM</label>
					</span>
					<span>
						<label><input name="hinhthuc" value="2" type="radio"> Nhận tiền mặt</label>
					</span>
					<span>
						<label><input name="hinhthuc" value="3" type="radio"> Thẻ ghi nợ</label>
					</span>
					
					<input style="background-color:#FE980F" value="Đặt hàng" type="submit">
					
				</div>
			</form>
		@endif
		</div>
	</section> <!--/#cart_items-->
@include('pages.block.footer')
 --}}