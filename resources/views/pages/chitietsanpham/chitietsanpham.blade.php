@extends('layout_chitietsanpham')
@section('trangchu')
@foreach($detail_sanpham as $value)
	<div class="product-details"><!--product-details-->
		<div class="col-sm-5">
			<div class="view-product">
				<img src="{{ asset('public/upload/'.$value->sanpham_image) }}" alt="" />
				<h3>ZOOM</h3>
			</div>
			<div id="similar-product" class="carousel slide" data-ride="carousel">
				
				  <!-- Wrapper for slides -->
				    
				    <div class="carousel-inner">
				    	@for($i=0;$i<count($splienquan);$i++)
							<div class="item {{$i==0 ? 'active' : ''}}">
				    		@foreach($splienquan as $value2)
							  <a href=""><img src="{{ asset('public/upload/'.$value2->sanpham_image) }}" alt=""></a>
							 @endforeach
							</div>
						@endfor
						{{-- <div class="item">
						  <a href=""><img src="{{ asset('public/upload/asus2.jpg') }}" alt=""></a>
						  <a href=""><img src="{{ asset('public/upload/asus2.jpg') }}" alt=""></a>
						  <a href=""><img src="{{ asset('public/upload/asus2.jpg') }}" alt=""></a>
						</div>
						<div class="item">
						  <a href=""><img src="{{ asset('public/upload/asus3.jpg') }}" alt=""></a>
						  <a href=""><img src="{{ asset('public/upload/asus3.jpg') }}" alt=""></a>
						  <a href=""><img src="{{ asset('public/upload/asus3.jpg') }}" alt=""></a>
						</div> --}}
					</div>

				  <!-- Controls -->
				  <a class="left item-control" href="#similar-product" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				  </a>
				  <a class="right item-control" href="#similar-product" data-slide="next">
					<i class="fa fa-angle-right"></i>
				  </a>
			</div>

		</div>
		<div class="col-sm-7">
			<div class="product-information"><!--/product-information-->
				<img src="{{ asset('public/frontend/image/new.jpg') }}" class="newarrival" alt="" />
				<h2>{{$value->sanpham_name}}</h2>
				<p>sản phảm ID: {{$value->id}}</p>
				<img src="{{ asset('public/frontend/image/rating.png') }}" alt="" />
				<form action="{{url('addcart')}}" method="POST">
					@csrf
					<span>
						<span>Giá: {{number_format($value->sanpham_gia).'vnđ'}}</span>
						<label>Số lượng:</label>
						<input name ="soluong"type="number" value="1" min="1" />
						<input name ="sanpham_id" type="hidden" value="{{$value->id}}">
						<button type="submit" class="btn btn-fefault cart">
							<i class="fa fa-shopping-cart"></i>
							Thêm giỏ hàng
						</button>
					</span>
				</form>
				<p><b>Tình trạng:</b> Còng hàng</p>
				<p><b>Điều kiện:</b> Mới</p>
				<p><b>Thương hiệu:</b> {{$value->thuonghieu_sp->thuonghieu_name}}</p>
				<p><b>Danh mục:</b> {{$value->category_sp->category_name}}</p>
				<a href=""><img src="{{ asset('public/frontend/image/share.png') }}" class="share img-responsive"  alt="" /></a>
				<div class="fb-share-button" data-href="{{$url}}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
				<div class="fb-like" data-href="{{$url}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
			</div><!--/product-information-->
		</div>
	</div><!--/product-details-->


	<div class="category-tab shop-details-tab"><!--category-tab-->
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#reviews" data-toggle="tab">Bình Luận & Đánh giá</a></li>
				<li><a href="#companyprofile" data-toggle="tab">Hồ sơ công ty</a></li>
				<li ><a href="#details" data-toggle="tab">Chi tiết</a></li>
			</ul>
		</div>
		<div class="tab-content">
			<div class="tab-pane fade" id="details" >
				<div class="col-sm-3">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{ asset('public/frontend/image/gallery4.jpg') }}" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="tab-pane fade" id="companyprofile" >
				
				<div class="col-sm-3">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{ asset('public/frontend/image/gallery4.jpg') }}" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="tab-pane fade active in" id="reviews" >
				<div class="col-sm-12">
					<div class="fb-comments" data-href="http://localhost/dientularavel/chi-tiet-san-pham/15" data-numposts="20" data-width=""></div>
				</div>
			</div>
			
		</div>
	</div><!--/category-tab-->

@endforeach

	<div class="recommended_items"><!--recommended_items-->
		<h2 class="title text-center">Sản Phẩm liên quan</h2>
		
		<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				@for($i=0;$i<count($splienquan);$i++)
				<div class="item {{$i==0 ? 'active' : ''}}">	
						@foreach($splienquan as $key => $value1)
						<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<div style="height: 271px">
										<img src="{{ asset('public/upload/'.$value1->sanpham_image) }}" alt="" />
									</div>
									<h2>{{number_format($value1->sanpham_gia).'đ'}}</h2>
									<p>{{$value1->sanpham_name}}</p>
									<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
								</div>
							</div>
						</div>
						</div>
						@endforeach
				</div>
				@endfor
			</div>
			 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			  </a>
			  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
				<i class="fa fa-angle-right"></i>
			  </a>			
		</div>
	</div><!--/recommended_items-->

@endsection