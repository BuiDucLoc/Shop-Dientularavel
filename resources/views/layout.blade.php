    @include('pages.block.menu')
    <section id="slider" ><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>L</span>-SHOPDIENTU</h1>
                                    <h2>Hiện Đại Với Cuộc Sống Của Bạn</h2>
                                    <p>Sản phẩm có chất lượng rất tốt, Nếu sản phẩm lỗi được đổi lại sản phẩm mới trong vòng 30 ngày bao sài thả ga, uy tính là trách nhiệm hàng đầu tiên của shop chúng tôi </p>
                                    <p>Mr. Lộc</p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{url('public/upload/p.png')}}" class="girl img-responsive" alt="" />
                                    <img src="{{url('public/frontend/image/pricing.png')}}"  class="pricing" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>L</span>-SHOPDIENTU</h1>
                                    <h2>100% Hàng Chính Hãng</h2>
                                    <p>Sản phẩm có chất lượng rất tốt, Nếu sản phẩm lỗi được đổi lại sản phẩm mới trong vòng 30 ngày bao sài thả ga, uy tính là trách nhiệm hàng đầu tiên của shop chúng tôi </p>
                                    <p>Mr. Lộc</p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{url('public/upload/tl.png')}}" class="girl img-responsive" alt="" />
                                    <img src="{{url('public/frontend/image/pricing.png')}}"  class="pricing" alt="" />
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>L</span>-SHOPDIENTU</h1>
                                    <h2>Bảo Hành Trọn Đời</h2>
                                   <p>Sản phẩm có chất lượng rất tốt, Nếu sản phẩm lỗi được đổi lại sản phẩm mới trong vòng 30 ngày bao sài thả ga, uy tính là trách nhiệm hàng đầu tiên của shop chúng tôi </p>
                                    <p>Mr. Lộc</p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img style="height:400px" src="{{url('public/upload/ll.png')}}" class="girl img-responsive" alt="" />
                                    <img src="{{url('public/frontend/image/pricing.png')}}" class="pricing" alt="" />
                                </div>
                            </div>
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->
    
    <section>
        <div class="container" style="margin-top:30px!important">
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
                            {{-- <img style="width: 100%" src="{{url('public/upload/lef3.jpg')}}" alt=""/>
                            <img style="width: 100%" src="{{url('public/upload/h.jpg')}}" alt=""/> --}}
                            <img style="width: 100%" src="{{url('public/frontend/image/shipping.jpg')}}" alt=""/>
                            {{-- <img style="width: 100%" src="{{url('public/upload/hehe.png')}}" alt=""/> --}}
                        </div><!--/shipping-->
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    
                    
                   @yield('trangchu')
                    
                   
                    
                </div>
            </div>
        </div>
    </section>
    
    @include('pages.block.footer')

