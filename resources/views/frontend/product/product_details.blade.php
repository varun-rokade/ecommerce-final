@extends('frontend.master_home')

@section('title')
    {{ $product->product_name_en }} | Product Details
@endsection

@section('content')

@php
	$hot_deals = App\Models\Product::where('status', 1)->where('hot_deals', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'ASC')->limit(10)->get();
@endphp


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="#">{{ $product->category->category_name_en }}</a></li>
                    <li class='active'>{{ $product->product_name_en }}</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>
                <div class='col-md-3 sidebar'>
                    <div class="sidebar-module-container">
                        {{-- <div class="home-banner outer-top-n">
                            <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
                        </div> --}}



                        <!-- ============================================== HOT DEALS ============================================== -->
                        @include('frontend.common.hot_deals')
                        <!-- ============================================== HOT DEALS: END ============================================== -->

                        <!-- ============================================== NEWSLETTER ============================================== -->
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== NEWSLETTER: END ============================================== -->

                        <!-- ============================================== Testimonials============================================== -->
                        

                        <!-- ============================================== Testimonials: END ============================================== -->



                    </div>
                </div><!-- /.sidebar -->
                <div class='col-md-9'>
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">

                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">




                                    <div id="owl-single-product">
                                        @foreach ($multiimg as $img)
                                            <div class="single-product-gallery-item" id="slide{{ $img->id }}">
                                                <a data-lightbox="image-1" data-title="Gallery"
                                                    href="{{ asset($img->photo) }}">
                                                    <img class="img-responsive" alt="" src="{{ asset($img->photo) }}"
                                                        data-echo="{{ asset($img->photo) }}" />
                                                </a>
                                            </div><!-- /.single-product-gallery-item -->
                                        @endforeach
                                    </div><!-- /.single-product-slider -->






                                    <div class="single-product-gallery-thumbs gallery-thumbs">

                                        <div id="owl-single-product-thumbnails">
                                            @foreach ($multiimg as $img)
                                                <div class="item">
                                                    <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                        data-slide="1" href="#slide{{ $img->id }}">
                                                        <img class="img-responsive" width="85" alt=""
                                                            src="{{ asset($img->photo) }}"
                                                            data-echo="{{ asset($img->photo) }}" />
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div><!-- /#owl-single-product-thumbnails -->

                                    </div><!-- /.gallery-thumbs -->



                                </div><!-- /.single-product-gallery -->
                            </div><!-- /.gallery-holder -->
                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    

                                        @if (session()->get('language') == 'hindi')
                                            <h1 class="name" id="pname_hin">{{ $product->product_name_hin }}</h1>
                                        @else
                                            <h1 class="name" id="pname">{{ $product->product_name_en }}</h1>
                                        @endif


                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="rating rateit-small"></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a href="#" class="lnk">(13 Reviews)</a>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.rating-reviews -->

                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Availability :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    <span class="value">In Stock</span>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.stock-container -->

                                    <div class="description-container m-t-20">

                                        @if (session()->get('language') == 'hindi')
                                            {{ $product->short_des_hin }}
                                        @else
                                            {{ $product->short_des_en }}
                                        @endif

                                    </div><!-- /.description-container -->

                                    <div class="price-container info-container m-t-20">
                                        <div class="row">


                                            <div class="col-sm-6">
                                                <div class="price-box">
                                                    @if ($product->discount_price == null)
                                                        <span class="price"> ₹ {{ $product->selling_price }}
                                                        </span>
                                                    @else
                                                        <span class="price"> ₹ {{ $product->discount_price }}
                                                        </span>
                                                        <span class="price-strike">{{ $product->selling_price }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="favorite-button m-t-10">
                                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                        title="Wishlist" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                        title="Add to Compare" href="#">
                                                        <i class="fa fa-signal"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                        title="E-mail" href="#">
                                                        <i class="fa fa-envelope"></i>
                                                    </a>
                                                </div>
                                            </div>

                                        </div><!-- /.row -->


                                        <br>
                                        <div class="row">

                                            @if ($product_color_en[0] !== '')
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="info-title control-label">
                                                            @if (session()->get('language') == 'hindi')
                                                                <span style="font-size: 15px">रंग </span>
                                                            @else
                                                                Color
                                                            @endif

                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        @if (session()->get('language') == 'hindi')
                                                            <select class="form-control unicase-form-control selectpicker"
                                                            style="display: none;" id="color_hin">
                                                            
                                                            <option selected disabled>--रंग पसंद करो--</option>
                                                            @foreach ($product_color_hin as $color)
                                                                <option value="{{ $color }}">
                                                                    {{ $color }}
                                                                </option>
                                                            @endforeach
                                                            </select>
                                                        @else
                                                            <select class="form-control unicase-form-control selectpicker"
                                                            style="display: none;" id="color">
                                                            <option selected disabled>--Choose Color--</option>
                                                            @foreach ($product_color_en as $color)
                                                                <option value="{{ $color }}">
                                                                    {{ $color }}
                                                                </option>
                                                            @endforeach
                                                            </select>
                                                        @endif


                                                        
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($product_size_en[0] !== '')
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="info-title control-label">
                                                            @if (session()->get('language') == 'hindi')
                                                                <span style="font-size: 15px">माप </span>
                                                            @else
                                                                Size
                                                            @endif

                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        @if (session()->get('language') == 'hindi')
                                                            <select class="form-control unicase-form-control selectpicker"
                                                            style="display: none;" id="size_hin">
                                                            
                                                            <option selected disabled>--नाप चुनें--</option>
                                                            @foreach ($product_size_hin as $size)
                                                                <option value="{{ $size }}">
                                                                    {{ $size }}
                                                                </option>
                                                            @endforeach
                                                            </select>
                                                        @else
                                                            <select class="form-control unicase-form-control selectpicker"
                                                            style="display: none;" id="size">
                                                            <option selected disabled>--Choose Size--</option>
                                                                @foreach ($product_size_en as $size)
                                                                    <option value="{{ $size }}">
                                                                        {{ $size }}</option>
                                                                @endforeach
                                                            </select>
                                                            @endif


                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                        </div><!-- /.row -->

                                    </div><!-- /.price-container -->

                                    <div class="quantity-container info-container">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <span class="label">Qty :</span>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <div class="arrows">
                                                            <div class="arrow plus gradient"><span
                                                                    class="ir"><i
                                                                        class="icon fa fa-sort-asc"></i></span></div>
                                                            <div class="arrow minus gradient"><span
                                                                    class="ir"><i
                                                                        class="icon fa fa-sort-desc"></i></span></div>
                                                        </div>
                                                        <input type="text" id="qty" min="1" value="1">
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}" min="1">
                                            <div class="col-sm-7">
                                                <button type="submit" onclick="addtocart()" class="btn btn-primary"><i
                                                        class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
                                            </div>


                                        </div><!-- /.row -->
                                    </div><!-- /.quantity-container -->






                                </div><!-- /.product-info -->
                            </div><!-- /.col-sm-7 -->
                        </div><!-- /.row -->
                    </div>

                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a>
                                    </li>
                                    <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                    <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                                </ul><!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-9">

                                <div class="tab-content">

                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text">

                                                @if (session()->get('language') == 'hindi')
                                                    <span style="font-size: 15px">{!! strip_tags($product->long_des_hin) !!}</span>
                                                @else
                                                    {!! $product->long_des_en !!}
                                                @endif

                                            </p>
                                        </div>
                                    </div><!-- /.tab-pane -->

                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">

                                            <div class="product-reviews">
                                                <h4 class="title">Customer Reviews</h4>

                                                @php
                                                    $reviews = App\Models\Review::where('product_id', $product->id)->where('status', 1)->latest()->limit(5)->get();
                                                @endphp

                                                <div class="reviews">
                                                    @foreach ($reviews as $item)
                                                        
                                                    <div class="review">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img src="{{ (!empty($item->user->profile_photo_path)) ? url('upload/user_images/'.$item->user->profile_photo_path) : url('upload/no_image.jpg') }}" alt="" width="40px" height="40px" style="border-radius:50%">
                                                                <b>{{ $item->user->name }}</b>
                                                            </div>
                                                            <div class="col-md-3">
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="review-title"><span class="summary">{{ $item->summary }}</span>
                                                            <span class="date"><i class="fa fa-calendar"></i><span>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                            </span></span></div>
                                                        <div class="text">{{ $item->comment }}</div>
                                                    </div>

                                                    @endforeach
                                                </div><!-- /.reviews -->
                                            </div><!-- /.product-reviews -->



                                            <div class="product-add-review">
                                                <h4 class="title">Write your own review</h4>
                                                <div class="review-table">
                                                    
                                                </div><!-- /.review-table -->

                                                <div class="review-form">
                                                    @guest
                                                    <p><b>Login to write review <a href="{{ route('login') }}">Login</a> </b></p>
                                                    @else
                                                    
                                                    <div class="form-container">
                                                        <form role="form" class="cnt-form" method="POST" action="{{ route('review.store') }}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    
                                                                    <div class="form-group">
                                                                        <label for="exampleInputSummary">Summary <span
                                                                                class="astk">*</span></label>
                                                                        <input type="text" name="summary" class="form-control txt"
                                                                            id="exampleInputSummary" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">Review <span
                                                                                class="astk">*</span></label>
                                                                        <textarea name="comment" class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                                    </div><!-- /.form-group -->
                                                                </div>
                                                            </div><!-- /.row -->

                                                            <div class="action text-right">
                                                                <button type="submit" class="btn btn-primary btn-upper">SUBMIT
                                                                    REVIEW</button>
                                                            </div><!-- /.action -->

                                                        </form><!-- /.cnt-form -->
                                                    </div><!-- /.form-container -->
                                                    @endguest
                                                </div><!-- /.review-form -->

                                            </div><!-- /.product-add-review -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                    <div id="tags" class="tab-pane">
                                        <div class="product-tag">

                                            <h4 class="title">Product Tags</h4>
                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-container">

                                                    <div class="form-group">
                                                        <label for="exampleInputTag">Add Your Tags: </label>
                                                        <input type="email" id="exampleInputTag" class="form-control txt">


                                                    </div>

                                                    <button class="btn btn-upper btn-primary" type="submit">ADD
                                                        TAGS</button>
                                                </div><!-- /.form-container -->
                                            </form><!-- /.form-cnt -->

                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <span class="text col-md-offset-3">Use spaces to separate tags. Use
                                                        single quotes (') for phrases.</span>
                                                </div>
                                            </form><!-- /.form-cnt -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                </div><!-- /.tab-content -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.product-tabs -->

                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">
							@if (session()->get('language') == 'hindi')
                    		संबंधित उत्पाद
                    		@else
							Related Products
                    		@endif
						</h3>
                        <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
							@if (session()->get('language') == 'hindi')
							@foreach ($related as $product)
								
							
                            <div class="item item-carousel">
                                <div class="products">

                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{ asset($product->product_thumbnail) }}" alt=""></a>
                                            </div><!-- /.image -->

                                            {{-- <div class="tag sale"><span>sale</span></div> --}}
											@php
											$amount = $product->selling_price - $product->discount_price;
											$discount = ($amount / $product->selling_price) * 100;
											@endphp

											<div>
											@if ($product->discount_price == NULL)
											<div class="tag new"><span>new</span></div>    
											@else
											<div class="tag hot"><span>{{ round($discount) }}%</span></div>
											@endif
                                </div>
                                        </div><!-- /.product-image -->


                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">{{ $product->product_name_hin }}</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            <div class="product-price"> 
                              
												@if ($product->discount_price == NULL)
												<span class="price"> ₹ {{ $product->selling_price }}
												</span> 
												@else
												<span class="price"> ₹ {{ $product->discount_price }}
												</span> 
												<span class="price-before-discount">{{ $product->selling_price }}
												</span>
												@endif
												
											  </div><!-- /.product-price -->

                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>

                                                    </li>

                                                    <li class="lnk wishlist">
                                                        <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                    </li>

                                                    <li class="lnk">
                                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                                            <i class="fa fa-signal"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->

                                </div><!-- /.products -->
                            </div><!-- /.item -->
							@endforeach
							@else
							@foreach ($related as $product)
								
							
                            <div class="item item-carousel">
                                <div class="products">

                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{ asset($product->product_thumbnail) }}" alt=""></a>
                                            </div><!-- /.image -->

                                            {{-- <div class="tag sale"><span>sale</span></div> --}}
											@php
											$amount = $product->selling_price - $product->discount_price;
											$discount = ($amount / $product->selling_price) * 100;
											@endphp

											<div>
											@if ($product->discount_price == NULL)
											<div class="tag new"><span>new</span></div>    
											@else
											<div class="tag hot"><span>{{ round($discount) }}%</span></div>
											@endif
                                </div>
                                        </div><!-- /.product-image -->


                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">{{ $product->product_name_en }}</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            <div class="product-price"> 
                              
												@if ($product->discount_price == NULL)
												<span class="price"> ₹ {{ $product->selling_price }}
												</span> 
												@else
												<span class="price"> ₹ {{ $product->discount_price }}
												</span> 
												<span class="price-before-discount">{{ $product->selling_price }}
												</span>
												@endif
												
											  </div><!-- /.product-price -->

                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>

                                                    </li>

                                                    <li class="lnk wishlist">
                                                        <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                    </li>

                                                    <li class="lnk">
                                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                                            <i class="fa fa-signal"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->

                                </div><!-- /.products -->
                            </div><!-- /.item -->
							@endforeach
							@endif
                        </div><!-- /.home-owl-carousel -->
                    </section><!-- /.section -->
                    <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

                </div><!-- /.col -->
                <div class="clearfix"></div>
            </div><!-- /.row -->

























            <!-- ==== ================== BRANDS CAROUSEL ============================================== -->
            <div id="brands-carousel" class="logo-slider wow fadeInUp">

                <div class="logo-slider-inner">
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                        <div class="item m-t-15">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->

                        <div class="item m-t-10">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
                    </div><!-- /.owl-carousel #logo-slider -->
                </div><!-- /.logo-slider-inner -->

            </div><!-- /.logo-slider -->
            <!-- == = BRANDS CAROUSEL : END = -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->

@endsection
