<?php 
  use Carbon\Carbon;
?>
    @include('pages.block.menu');
    
   
    
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

