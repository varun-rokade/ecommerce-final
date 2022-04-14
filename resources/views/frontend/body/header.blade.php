<header class="header-style-1"> 
  
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
      <div class="container">
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled">
              <li><a href="#"><i class="icon fa fa-user"></i>
                @if (session()->get('language') == 'hindi')
                <span style="font-size: 15px">मेरा खाता</span>
                @else
                  My Account
                @endif
              </a></li>
              <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>
                @if (session()->get('language') == 'hindi')
                <span style="font-size: 15px">इच्छा-सूची</span>
                @else
                  Wishlist
                @endif
              </a></li>
              <li><a href="{{ route('mycart') }}"><i class="icon fa fa-shopping-cart"></i>
                @if (session()->get('language') == 'hindi')
                  <span style="font-size: 15px">मेरा कार्ट</span>
                @else
                  My Cart
                @endif
              </a></li>
              <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>
                @if (session()->get('language') == 'hindi')
                  <span style="font-size: 15px">चेक आउट</span>
                @else
                  Checkout
                @endif
              </a></li>
              <li><a href="" type="button" data-toggle="modal" data-target="#exampleModal1"><i class="icon fa fa-truck"></i>
                @if (session()->get('language') == 'hindi')
                  <span style="font-size: 15px">ऑर्डर पर नज़र रखें</span>
                @else
                  Track Order
                @endif
              </a></li>
              @auth
              <li><a href="{{ route('login') }}"><i class="icon fa fa-user"></i>
                @if (session()->get('language') == 'hindi')
                  <span style="font-size: 15px">प्रोफ़ाइल</span>
                @else
                  Profile
                @endif
              </a></li>
              @else
              <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>
                @if (session()->get('language') == 'hindi')
                  <span style="font-size: 15px">लॉग इन/रजिस्टर</span>
                @else
                  Login/Register
                @endif
              </a></li>
              @endauth

              
            </ul>
          </div>
          <!-- /.cnt-account -->
          
          <div class="cnt-block">
            <ul class="list-unstyled list-inline">
              {{-- <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">USD</a></li>
                  <li><a href="#">INR</a></li>
                  <li><a href="#">GBP</a></li>
                </ul>
              </li> --}}
              <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">
                @if (session()->get('language') == 'hindi')
                <span style="font-size: 15px">भाषा: हिन्दी</span>
                @else
                  Language: English
                @endif
                 </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  @if (session()->get('language') == 'hindi')
                  <li><a href="{{ route('english') }}">English</a></li>
                  @else
                  <li><a href="{{ route('hindi') }}">हिन्दी</a></li>    
                  @endif
                  
                </ul>
              </li>
            </ul>
            <!-- /.list-unstyled --> 
          </div>
          <!-- /.cnt-cart -->
          <div class="clearfix"></div>
        </div>
        <!-- /.header-top-inner --> 
      </div>
      <!-- /.container --> 
    </div>
    <!-- /.header-top --> 
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 top"> 
            <!-- ============================================================= LOGO ============================================================= -->
             {{-- <a href="{{ url('/') }}"> <h2>Ecommerce Store</h2> </a> --}}
             <div class="header" style="overflow: hidden; " >
              <a href="{{ url('/') }}" class="logo" style="color:azure"><h2>E-commerce Store</h2></a></div>
            <!-- /.logo --> 
            <!-- ============================================================= LOGO : END ============================================================= --> </div>
          <!-- /.logo-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder" style="padding-top: 7px;"> 
            <!-- /.contact-row --> 
            <!-- ============================================================= SEARCH AREA ============================================================= -->
            <div class="search-area"  style="width: 610px;">
              <form>
                <div class="control-group">
                  <ul class="categories-filter animate-dropdown">
                    <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" >
                        <li class="menu-header">Computer</li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>
                      </ul>
                    </li>
                  </ul>
                  <input class="search-field" placeholder="Search here..." />
                  <a class="search-button" href="#" ></a> </div>
              </form>
            </div>
            <!-- /.search-area --> 
            <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
          <!-- /.top-search-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row" style="padding-top: 14px;"> 
            
            
            
            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
            
            <div class="dropdown dropdown-cart"  style="width: 200px;"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
              <div class="items-cart-inner">
                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                <div class="basket-item-count"><span class="count" id="cartqty">2</span></div>
                <div class="total-price-basket"> 
                  <span class="lbl" >cart -</span> 
                  <span class="total-price"> <span class="sign">₹ </span>
                  <span class="value" id="subtotal"></span> </span> </div>
              </div>
              </a>
              <ul class="dropdown-menu">
                <li>
                  
{{-- mini cart --}}

                  <div id="minicart"></div>

{{-- end mini cart --}}
                  <div class="clearfix cart-total">
                    <div class="pull-right"> <span class="text">Sub Total :</span>₹ <span class='price' id="subtotal">r</span> </div>
                    <div class="clearfix"> </div>
                    <a href="{{ route('checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                  <!-- /.cart-total--> 
                  
                </li>
              </ul>
              <!-- /.dropdown-menu--> 
            </div>
            <!-- /.dropdown-cart --> 
            
            <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
          
          
          
          <!-- /.top-cart-row --> 
        </div>
        <!-- /.row --> 
        
      </div>
      <!-- /.container --> 
      
    </div>
    <!-- /.main-header --> 
    
    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
      <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
          <div class="navbar-header">
         <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
         <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="nav-bg-class">
            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
              <div class="nav-outer">
                <ul class="nav navbar-nav">
                  <li class="active dropdown yamm-fw"> <a href="{{ url('/') }}" data-hover="dropdown" class="dropdown-toggle">
                    
                    @if (session()->get('language') == 'hindi')
                    <span style="font-size: 15px">घर</span>
                    @else
                      Home
                    @endif
                    
                  </a> </li>

{{-- category table data --}}
                  @php
                      $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                  @endphp

                  @foreach ($categories as $item)
                      
                  
                  <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                  
                    @if (session()->get('language') == 'hindi')
                      <span style="font-size: 15px">{{ $item->category_name_hin }}</span>
                    @else
                      {{ $item->category_name_en }}
                    @endif
                    
                  </a>
                    <ul class="dropdown-menu container">
                      <li>
                        <div class="yamm-content ">
                          <div class="row">
                            {{-- subcategory data --}}
                            @php
                                $subcategories = App\Models\SubCategory::where('category_id', $item->id)->orderBy('subcategory_name_en', 'ASC')->get();
                            @endphp

                            @foreach ($subcategories as $sub)
                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">

                              @if (session()->get('language') == 'hindi')
                                <a href="{{ url('subcategory/product/'.$sub->id.'/'.$sub->subcategory_slug_en ) }}"><h2 class="title">{{ $sub->subcategory_name_hin }}</h2></a>
                              @else
                                <a href="{{ url('subcategory/product/'.$sub->id.'/'.$sub->subcategory_slug_en ) }}"><h2 class="title">{{ $sub->subcategory_name_en }}</h2></a>
                              @endif

                              @php
                                $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $sub->id)->orderBy('subsubcategory_name_en', 'ASC')->get();
                              @endphp

                              @foreach ($subsubcategories as $subsub)

                              <ul class="links">
                                <li><a href="{{ url('subsubcategory/product/'.$subsub->id.'/'.$subsub->subsubcategory_slug_en ) }}">
                                
                                  @if (session()->get('language') == 'hindi')
                                    <span style="font-size: 15px">{{ $subsub->subsubcategory_name_hin }}</span>
                                  @else
                                    {{ $subsub->subsubcategory_name_en }}
                                  @endif

                                </a></li>
                              </ul>

                              @endforeach
                            </div>
                            @endforeach
                            <!-- /.col -->
                            
                            
                            
                            {{-- <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/top-menu-banner.jpg') }}" alt=""> </div> --}}
                            <!-- /.yamm-content --> 
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
                  @endforeach
                  
                  <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
                </ul>
                <!-- /.navbar-nav -->
                <div class="clearfix"></div>
              </div>
              <!-- /.nav-outer --> 
            </div>
            <!-- /.navbar-collapse --> 
            
          </div>
          <!-- /.nav-bg-class --> 
        </div>
        <!-- /.navbar-default --> 
      </div>
      <!-- /.container-class --> 
      
    </div>
    <!-- /.header-nav --> 
    <!-- ============================================== NAVBAR : END ============================================== --> 
    
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Track Your Order</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('track.order') }}" method="POST">
              @csrf
              <div class="modal-body">
                <label for="">Invoice Number: </label>
                <input type="text" name="invoice_number" required class="form-control" placeholder="Order Invoice Number" id="">
                <br><button class="btn btn-primary" type="submit">Track</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </header>