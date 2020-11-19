<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- seo wwebsit hiển thị thông tin website theo từng trang --}}
    <meta name="description" content="Từ 2/11 - 5/11, khách hàng mua Samsung Galaxy M51 được giảm ngay 1 triệu, trả góp 0% và tham gia thu cũ đổi mới">
    <meta name="keywords" content="Galaxy M51, M51, Hotsale, minigame, Samsung Galaxy M51, minigame M51, hotsale m51"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link rel="canonical" href="http://localhost/dientularavel/"/>
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href=""/>
    {{-- -end --}}


    {{-- chia se len facbook nhưng thông tin dựa --}}
    <meta property="og:image" content="Từ 2/11 - 5/11, khách hàng mua Samsung Galaxy M51 được giảm ngay 1 triệu, trả góp 0% và tham gia thu cũ đổi mới" />
    <meta property="og:site_name" content="thiatv.com" />
    <meta property="og:description" content="Từ 2/11 - 5/11, khách hàng mua Samsung Galaxy M51 được giảm ngay 1 triệu, trả góp 0% và tham gia thu cũ đổi mới" />
    <meta property="og:title" content="Home | L-Dientularavel" />
    <meta property="og:url" content="http://localhost/dientularavel/" />
    <meta property="og:type" content="website" />
    {{-- end --}}
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0" nonce="ALkClRlZ"></script>
    
    <title>Home | L-Dientularavel</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/customer.css')}}" rel="stylesheet">
    
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
    @if (Session::has('messige'))
        <div id="alert1" class="{!! Session::get('alert') !!}" >
            {!! Session::get('messige') !!}
        </div>
    @endif
<header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{url('/trangchu')}}"><img src="{{url('public/frontend/image/logo.png')}}" alt="" /></a>
                        </div>
                       {{--  <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    USA
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canada</a></li>
                                    <li><a href="#">UK</a></li>
                                </ul>
                            </div>
                            
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    DOLLAR
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canadian Dollar</a></li>
                                    <li><a href="#">Pound</a></li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                @if(session::get('user_id')!=null)
                                    <li><a href="#"><i class="fa fa-user"></i> {{session::get('user_name')}}</a></li>
                                    <li><a href="{{url('dangxuat')}}"><i class="fa fa-star"></i> Đăng xuất</a></li>
                                    @if(session::get('shipping_id')==null)
                                        <li><a href="{{url('thongtin_donhang')}}"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>
                                    @else
                                        <li><a href="{{url('thanhtoan')}}"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>
                                    @endif
                                @endif
                                <li>
                                    @if(count(Cart::content())>0)
                                        <div class="notice">
                                            <div style="text-align:center;color: white;">
                                                {{Cart::count()}}
                                            </div>
                                        </div>
                                    @endif
                                    <a href="{{url('giohang')}}"><i class="fa fa-shopping-cart"></i> Cart</a>
                                </li>
                                <li><a href="{{url('user_login')}}"><i class="fa fa-lock"></i> Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{url('/trangchu')}}" class="active">Trang chủ</a></li>
                                <li class="dropdown"><a href="{{url('sanpham')}}">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                    @foreach($category as $value)
                                        <li><a href="{!!url('danhmuc_sanpham/'.$value->id)!!}">{{$value->category_name}}</a></li>
                                     @endforeach
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
                                @php
                                    $dl = Cart::content();
                                @endphp
                                <li>

                                    <a href="{{url('giohang')}}">Giỏ hàng</a>
                                </li>

                                <li><a href="contact-us.html">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <form action="{{url('timkiemsanpham')}}" method="POST">
                            @csrf
                                <input class="btn btn-default update left t" type="submit" value="Tìm Kiếm">
                            <div class="search_box pull-right">
                                <input type="text" placeholder="Search" name="timkiem" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->