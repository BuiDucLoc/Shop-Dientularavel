@extends('layout_sanpham')
@section('trangchu')
	<div class="blog-post-area">
		<h2 class="title text-center">BÀI VIẾT HÔM NAY</h2>
	</div><!--/blog-post-area-->

					
					<div class="media commnets">
						<a class="pull-left" href="#">
							<img style="width: 180px;height: auto;" class="media-object" src="{{ asset('public/frontend/image/nokia.jpg') }}" alt="">
						</a>
						<div class="media-body">
							<a href="#"><h4 class="media-heading">Tin buồn: Nokia 9.3 PureView 5G tiếp tục bị trì hoãn ra mắt cho đến năm sau</h4></a>
							<p>Theo một số báo cáo trước đây cho biết, HMD Global đã phát triển mẫu máy kế nhiệm của Nokia 9 PureView, dự kiến sẽ tiến ra thị trường với tên gọi là Nokia 9.3 PureView được một thời gian khá dài...</p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
					</div><!--Comments-->

					<div class="media commnets">
						<a class="pull-left" href="#">
							<img style="width: 180px;height: auto;" class="media-object" src="{{ asset('public/frontend/image/lap.jpg') }}" alt="">
						</a>
						<div class="media-body">
							<a href="#"><h4 class="media-heading">Touch Bar của MacBook thế hệ tiếp theo sẽ có thêm cảm ứng lực Force Touch?</h4></a>
							<p>Theo thông tin mới nhận được, Apple vừa đăng ký một bằng sáng chế mới với Văn phòng Sáng chế & Nhãn hiệu Hoa Kỳ về một chiếc MacBook Touch Bar có công nghệ Force Touch mới.</p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
					</div><!--Comments-->

					<div class="media commnets">
						<a class="pull-left" href="#">
							<img style="width: 180px;height: auto;" class="media-object" src="{{ asset('public/frontend/image/bater.jpg') }}" alt="">
						</a>
						<div class="media-body">
							<a href="#"><h4 class="media-heading">Mời bạn nhanh tay tải về tựa game đình đám trị giá 12,81$ đang được miễn phí trên Epic Games</h4></a>
							<p>Mời các bạn hãy nhanh tay tải về tựa game đình đám: MudRunner trị giá 12,81$ đang được miễn phí trên Epic Games ngay nhé!</p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
					</div><!--Comments-->

					<div class="media commnets">
						<a class="pull-left" href="#">
							<img style="width: 180px;height: auto;" class="media-object" src="{{ asset('public/frontend/image/black.jpg') }}" alt="">
						</a>
						<div class="media-body">
							<a href="#"><h4 class="media-heading">Black Friday – Sale lớn nhất năm chính thức bắt đầu, săn ngay kẻo hết!!!</h4></a>
							<p>Vào 0 giờ ngày 27/11/2020, lễ hội sale off, giảm giá sản phẩm công nghệ lớn nhất trong năm của CellphoneS chính thức bắt đầu.</p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
					</div><!--Comments-->
					<div class="media commnets">
						<a class="pull-left" href="#">
							<img style="width: 180px;height: auto;" class="media-object" src="{{ asset('public/frontend/image/epay.jpg') }}" alt="">
						</a>
						<div class="media-body">
							<a href="#"><h4 class="media-heading">Google sẽ cho phép Android được cập nhật qua Play Store?</h4></a>
							<p>Google đã giới thiệu Project Mainline để cải thiện quyền truy cập vào các bản cập nhật Android và bạn sẽ sớm thấy được sự thay đổi trong thời gian tới.</p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
					</div><!--Comments-->
					{{-- <div class="replay-box">
						<div class="row">
							<div class="col-sm-4">
								<h2>Leave a replay</h2>
								<form>
									<div class="blank-arrow">
										<label>Your Name</label>
									</div>
									<span>*</span>
									<input type="text" placeholder="write your name...">
									<div class="blank-arrow">
										<label>Email Address</label>
									</div>
									<span>*</span>
									<input type="email" placeholder="your email address...">
									<div class="blank-arrow">
										<label>Web Site</label>
									</div>
									<input type="email" placeholder="current city...">
								</form>
							</div>
							<div class="col-sm-8">
								<div class="text-area">
									<div class="blank-arrow">
										<label>Your Name</label>
									</div>
									<span>*</span>
									<textarea name="message" rows="11"></textarea>
									<a class="btn btn-primary" href="">post comment</a>
								</div>
							</div>
						</div>
					</div><!--/Repaly Box--> --}}
@endsection