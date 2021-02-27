@include('pages.block.menu')
<section id="form" style="margin-top: 0px!important"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập tài khoản</h2>
						<form action="{{url('dangnhap')}}"method="POST">
							@csrf
							<input type="email" placeholder="Tài khoản" name="username" />
							<input type="password" placeholder="password"name="password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Ghi nhớ mật khẩu
							</span>
							<a class="btn btn-block btn-social btn-foursquare" href="{{url('login-facebook')}}">
    							<span class="fa fa-facebook-official fb"></span> Đăng nhập bằng tải khoản facebook!
  							</a>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Bạn chưa có tài khoản? Vui lòng đăng ki!</h2>
						<form action="{{url('dangki')}}" method="POST">
							@csrf
							<input type="text" placeholder="Họ và tên" name="ten" />
							<p class="error">{!! $errors->first('ten') !!}
							<input type="email" placeholder="Email" name="email" />
							<p class="error">{!! $errors->first('email') !!}
							<input type="password" placeholder="Password" name="password"/>
							<p class="error">{!! $errors->first('password') !!}
							<input type="text" placeholder="phone" name="phone" />
							<p class="error">{!! $errors->first('phone') !!}
							<div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
							<p class="error">{!! $errors->first('g-recaptcha-response') !!}
							<br>
							<button type="submit" class="btn btn-default">Đăng kí</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@include('pages.block.footer')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
