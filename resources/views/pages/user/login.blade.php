@include('pages.block.menu');
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
							<input type="email" placeholder="Email" name="email" />
							<input type="password" placeholder="Password" name="password"/>
							<input type="text" placeholder="phone" name="phone" />
							<button type="submit" class="btn btn-default">Đăng kí</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@include('pages.block.footer');