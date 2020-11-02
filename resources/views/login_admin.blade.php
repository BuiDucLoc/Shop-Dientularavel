<!DOCTYPE html>
<head>
<title>Đăng Nhập</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/admin/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/admin/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/admin/css/style-responsive.css')}}" rel="stylesheet"/>
<link href="{{asset('public/admin/css/customer.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/admin/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/admin/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="{{asset('public/admin/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('public/admin/js/Customer.js')}}"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	@if (Session::has('messige'))
        <div id="alert1" class="{!! Session::get('alert') !!}" >
            {!! Session::get('messige') !!}
        </div>
    @endif

	<h2>Đăng Nhập</h2>
		<form action="{{url('admin_dangnhap')}}" method="post">
			@csrf
			<input type="email" class="ggg" name="email_admin" placeholder="E-MAIL" required="">
			<input type="password" class="ggg" name="password_admin" placeholder="PASSWORD" required="">
			<span><input type="checkbox" />Nhớ mật khâu</span>
			<h6><a href="#">Quyên mật khẩu?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Đăng Nhập" name="login">
		</form>
		<p>Bạn chưa có tài khoản ?<a href="registration.html">Tạo tài khoản mới</a></p>
</div>
</div>
<script src="{{asset('public/admin/js/bootstrap.js')}}"></script>
<script src="{{asset('public/admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/admin/js/scripts.js')}}"></script>
<script src="{{asset('public/admin/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/admin/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/admin/js/jquery.scrollTo.js')}}"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
