<?php 
  use Carbon\Carbon;
?>
{{-- @include('pages.block.menu'); --}}
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- seo wwebsit hiển thị thông tin website theo từng trang --}}
    @foreach($detail_sanpham as $value3)
    <meta name="description" content="{{$value3->sanpham_noidung}}">
    <meta name="keywords" content="{{$value3->sanpham_name}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link rel="canonical" href="{{$url}}"/>
    <meta name="author" content="{{$value3->sanpham_mota}}">
    <link rel="icon" type="image/x-icon" href=""/>
    {{-- -end --}}


    {{-- chia se len facbook nhưng thông tin dựa --}}
    <meta property="og:image" content="{{$value3->sanpham_image}}" />
    <meta property="og:site_name" content="thiatv.com" />
    <meta property="og:description" content="{{$value3->sanpham_noidung}}" />
    <meta property="og:title" content="{{$value3->sanpham_name}}" />
    <meta property="og:url" content="{{$url}}" />
    <meta property="og:type" content="website" />
    {{-- end --}}
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0" nonce="ALkClRlZ"></script>
    @endforeach
    <title>Home | L-Dientularavel</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
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







   
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục sản phâm</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            
                           
                        @foreach($category as $value)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{!!url('danhmuc_sanpham/'.$value->id)!!}">{{$value->category_name}}</a></h4>
                                </div>
                            </div>
                        @endforeach
                            
                            
                        </div><!--/category-products-->
                    
                        <div class="brands_products">
                            <h2>Thương hiệu</h2>
                                <div class="brands-name">
                                    @foreach($thuonghieu as $value1)
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="{{url('thuonghieu_sanpham/'.$value1->id)}}"> <span class="pull-right"></span>{{$value1->thuonghieu_name}}</a></li>
                                    </ul>
                                    @endforeach
                                </div>
                            
                        </div><!--/brands_products-->
                        
                        <div class="price-range"><!--price-range-->
                            <h2>Lọc Theo Giá</h2>
                            <div class="well text-center">
                                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range-->
                        
                        <div class="shipping text-center"><!--shipping-->
                            {{-- <img src="{{url('public/frontend/image/shipping.jpg')}}" alt="" /> --}}
                            <img style="width: 100%" src="{{url('public/upload/lef3.jpg')}}" alt=""/>
                            <img style="width: 100%" src="{{url('public/upload/hehe.png')}}" alt=""/>
                        </div><!--/shipping-->

                        <div class="shipping text-center">
                            <img src="{{url('public/frontend/image/shipping.jpg')}}" alt="" />
                        </div>
                        <div class="shipping text-center">
                            <img style="width: 100%" src="{{url('public/upload/h.jpg')}}" alt=""/>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    
                    
                   @yield('trangchu')
                    
                   
                    
                </div>
            </div>
        </div>
    </section>
    
      
    @include('pages.block.footer')

