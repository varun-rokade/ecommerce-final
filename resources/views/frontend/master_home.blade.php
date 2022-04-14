<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>@yield('title')</title>
<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<script src="https://js.stripe.com/v3/"></script>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
<script src="{{ asset('backend/js/code.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}"
    switch(type)
    {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>

{{-- modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 800px; right: 100px;">
        <div class="modal-header">
          {{-- <h5 class="modal-title" id="exampleModalLabel">
            @if (session()->get('language') == 'hindi')
            प्रोडक्ट का नाम:
            @else  
            Product Name: 
            @endif
            </h5> --}}
          <h5 class="modal-title" id="exampleModalLabel"><strong>
            @if (session()->get('language') == 'hindi')
            <span id="pname_hin"></span>
          @else
            <span id="pname"></span> </strong></h5>
          @endif
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        
                        <img src=" " class="card-img-top" alt="..." style="height: 200px; width: 180px;" id="pimage">
                      </div>
                </div>
                <div class="col-md-4">
                    <ul class="list-group">
                        {{-- <li class="list-group-item">Product Name: </li> --}}
                        <li class="list-group-item">
                            @if (session()->get('language') == 'hindi')
                            उत्पाद की कीमत: 
                            @else  
                            Product Price: 
                            @endif
                            
                            <strong class="text-danger">Rs. <span id="pprice"></span></strong>  <del id="oldprice"></del></li>
                        <li class="list-group-item">
                            @if (session()->get('language') == 'hindi')
                            उत्पाद कोड: 
                            @else  
                            Product Code: 
                            @endif
                             
                            <strong id="pcode"></strong></li>
                        <li class="list-group-item">
                            @if (session()->get('language') == 'hindi')
                            श्रेणी: <strong id="pcategory_hin"></strong>
                            @else  
                            Category: <strong id="pcategory"></strong>
                            @endif
                             
                            </li>
                        <li class="list-group-item">
                            @if (session()->get('language') == 'hindi')
                            स्टॉक: 
                            @else  
                            Stock: 
                            @endif
                             
                            <span class="badge badge-success-light badge-lg" style="background-color: green; color: white;" id="available"></span>
                            <span class="badge badge-danger-light badge-lg" style="background-color: red; color: white;" id="unavailable"></span>
                          </li>
                      </ul>
                </div>
                <div class="col-md-4">
                    <div class="form-group" id="colorArea">
                        <label for="exampleFormControlSelect1">

                          @if (session()->get('language') == 'hindi')
                          <span style="font-size: 15px">रंग पसंद करो</span>
                          @else
                          Choose Color
                          @endif
                          
                        </label>

                        {{-- @if (session()->get('language') == 'hindi')
                        <select class="form-control" id="color_hin" name="color_hin">
                        </select>
                        @else --}}
                        <select class="form-control" id="color" name="color">
                        </select>
                        {{-- @endif --}}

                      </div>
                      <div class="form-group" id="sizeArea">
                        <label for="exampleFormControlSelect1">
                          
                          @if (session()->get('language') == 'hindi')
                          <span style="font-size: 15px">नाप चुनें</span>
                          @else
                          Choose Size
                          @endif
                        
                        </label>

                        {{-- @if (session()->get('language') == 'hindi')
                        <select class="form-control" id="size_hin" name="size_hin">
                        </select>
                        @else --}}
                        <select class="form-control" id="size" name="size">                    
                        </select>
                        {{-- @endif --}}

                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">
                          
                          @if (session()->get('language') == 'hindi')
                          <span style="font-size: 15px">मात्रा</span>
                          @else
                          Quantity
                          @endif

                        </label>
                        <input type="number" class="form-control" name="qty" id="qty" value="1" min="1">
                        <input type="hidden" id="product_id">
                        <br><button type="submit" class="btn btn-primary mb-2" onclick="addtocart()">Add to Cart</button>
                      </div>
                </div>
            </div>

        </div>
        {{-- end modal --}}
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>

<script type="text/javascript">

    $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
    });

    // product view modal

    function productView(id)
    {
        // alert(id)
        $.ajax({
            type: 'GET',
            url: '/product/view/modal/'+id,
            dataType: 'json',
            success: function(data){
                // console.log(data)
                $('#pname').text(data.product.product_name_en);
                $('#price').text(data.product.selling_price);
                $('#pcode').text(data.product.product_code);
                $('#pcategory').text(data.product.category.category_name_en);
                $('#pstock').text(data.product.product_qty);
                $('#pimage').attr('src','/'+data.product.product_thumbnail);
                $('#pcategory_hin').text(data.product.category.category_name_hin);
                $('#pname_hin').text(data.product.product_name_hin);
                $('#product_id').val(id);
                $('#qty').val(1);
                
                if(data.product.discount_price == null){
                  // $('#pprice').text('');
                  
                  $('#pprice').text(data.product.selling_price);
                  $('#oldprice').text('');
                }
                else{
                  $('#pprice').text(data.product.discount_price);
                  $('#oldprice').text(data.product.selling_price);
                }

                if (data.product.product_qty > 0) {
                  $('#available').text('In Stock');
                  $('#unavailable').text('');
                }
                else{
                  $('#unavailable').text('Stock Out');
                  $('#available').text('');
                }

                $('select[name = "color"').empty();
                $.each(data.color_en, function(key, value){
                    $('select[name = "color"]').append('<option value=" '+value+' ">'+value+' </option>')
                    if(data.color_en == ""){
                        $('#colorArea').hide();
                    }
                    else{
                        $('#colorArea').show();
                    }
                });

                $('select[name = "size"').empty();
                $.each(data.size_en, function(key, value){
                    $('select[name = "size"]').append('<option value=" '+value+' ">'+value+' </option>');
                    if(data.size_en == ""){
                        $('#sizeArea').hide();
                    }
                    else{
                        $('#sizeArea').show();
                    }
                });

                $('select[name = "color_hin"').empty();
                $.each(data.color_hin, function(key, value){
                    $('select[name = "color_hin"]').append('<option value=" '+value+' ">'+value+' </option>')
                    if(data.color_hin == ""){
                        $('#colorArea').hide();
                    }
                    else{
                        $('#colorArea').show();
                    }
                });

                $('select[name = "size_hin"').empty();
                $.each(data.size_hin, function(key, value){
                    $('select[name = "size_hin"]').append('<option value=" '+value+' ">'+value+' </option>');
                    if(data.size_hin == ""){
                        $('#sizeArea').hide();
                    }
                    else{
                        $('#sizeArea').show();
                    }
                });
            }
        });
    }
// end product view modal

// add to cart

    function addtocart(){
      var product_name_en = $('#pname').text();
      var product_name_hin = $('#pname_hin').text();
      var id = $('#product_id').val();
      var color_en = $('#color option:selected').text();
      var color_hin = $('#color_hin option:selected').text();
      var size_en = $('#size option:selected').text();
      var size_hin = $('#size_hin option:selected').text();
      var qty = $('#qty').val();

      $.ajax({
        type: 'POST',
        dataType: 'json',
        data: {
          color_en: color_en,
          color_hin: color_hin,
          size_en: size_en,
          size_hin: size_hin,
          qty: qty,
          id: id,
          product_name_en: product_name_en,
          product_name_hin: product_name_hin
        },
        url: "/cart/data/store/"+id,
        success:function(data){
          minicart();
          $('#closeModal').click();
          console.log();
          const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      if ($.isEmptyObject(data.error)) 
                      {
                        Toast.fire({
                          type: 'success',
                          title: data.success
                        })
                      }
                      else
                      {
                        Toast.fire({
                          type: 'error',
                          title: data.error
                        })
                      }
        }
      });
    }

// end add to cart
</script>

<script type="text/javascript">
  function minicart(){
    $.ajax({
      type: 'GET',
      url: '/product/mini/cart',
      dataType: 'json',
      success:function(response){
        $('span[id="subtotal"]').text(response.carttotal);
        $('#cartqty').text(response.cartqty);
        var minicart = "";
        $.each(response.cart, function(key, value){
          minicart += `<div class="cart-item product-summary">
                      <div class="row">
                            <div class="col-xs-4">
                              <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
                            </div>
                            <div class="col-xs-7">
                              <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                              <div class="price">₹ ${value.price} * ${value.qty}</div>
                            </div>
                            <div class="col-xs-1 action">
                              <button type="submit" id="${value.rowId}" onclick="minicartremove(this.id)"><i class="fa fa-trash"></i></button> </div>
                          </div>
                      </div>
                      <!-- /.cart-item -->
                      <div class="clearfix"></div>
                      <hr>`
        });

        $('#minicart').html(minicart)
      }
    });
  }
  minicart();


  function minicartremove(rowId){
    $.ajax({
      type: 'GET',
      url: '/minicart/product-remove/'+rowId,
      dataType: 'json',
      success: function(data){
        minicart();
        
        const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) 
                      {
                        Toast.fire({
                          type: 'success',
                          title: data.success
                        })
                      }
                      else
                      {
                        Toast.fire({
                          type: 'error',
                          title: data.error
                        })
                      }

      }
    });
  }

</script>

<script type="text/javascript">

  function addtowishlist(product_id){
    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: '/add-to-wishlist/'+product_id,
      success: function(data){
        const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) 
                      {
                        Toast.fire({
                          type: 'success',
                          icon: 'success',
                          title: data.success
                        })
                      }
                      else
                      {
                        Toast.fire({
                          type: 'error',
                          icon: 'error',
                          title: data.error
                        })
                      }
      }
    });
  }

</script>

<script type="text/javascript">
  function wishlist(){
    $.ajax({
      type: 'GET',
      url: '/user/get-wishlist',
      dataType: 'json',
      success:function(response){
        var rows = "";
        $.each(response, function(key, value){
          rows += `<tr>
					<td class="col-md-2"><img src="/${value.product.product_thumbnail}" alt="image"></td>
					<td class="col-md-7">
						<div class="product-name"><a href="#">${value.product.product_name_en}</a></div>
						<div class="price">
							${value.product.discount_price == null ? `₹ ${value.product.selling_price}` : `₹ ${value.product.discount_price} <span>${value.product.selling_price}</span>`
              
              }
							
						</div>
					</td>
					<td class="col-md-2">
						<button data-toggle="modal" id="${value.product_id}" onclick="productView(this.id)" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add to Cart">Add to cart</button>
					</td>
					<td class="col-md-1 close-btn">
						<button type="submit" id="${value.id}" onclick="removewishlist(this.id)" class="btn btn-danger"><i class="fa fa-trash"></i></button>
					</td>
				</tr>`
        });

        $('#wishlist').html(rows)
      }
    });
  }
  wishlist();

</script>

<script type="text/javascript">

  function removewishlist(id){
    $.ajax({
      type: 'GET',
      url: '/user/wishlist-remove/'+id,
      dataType: 'json',
      success: function(data){
        wishlist();
        
        const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) 
                      {
                        Toast.fire({
                          type: 'success',
                          icon: 'success',
                          title: data.success
                        })
                      }
                      else
                      {
                        Toast.fire({
                          type: 'error',
                          icon: 'error',
                          title: data.error
                        })
                      }

      }
    });
  }

</script>

<script type="text/javascript">
  function mycart(){
    $.ajax({
      type: 'GET',
      url: '/user/get-cart',
      dataType: 'json',
      success:function(response){
        var rows = "";
        $.each(response.cart, function(key, value){
          rows += `<tr>
					<td class="col-md-2"><img src="/${value.options.image}" alt="image" style="width: 60px;"></td>
					<td class="col-md-2">
						<div class="product-name"><a href="#">${value.name}</a></div>
						<div class="price">
							₹ ${value.price}
						</div>
					</td>
          <td class="col-md-2">
						<strong>
              ${value.options.color == null ?
                `<span></span>` : `<strong>${value.options.color}</strong>`
              }
            </strong>
					</td>
          <td class="col-md-2">
          ${value.options.size == null
            ? `<span></span>`
            :
          `<strong>${value.options.size} </strong>` 
          }           
          </td>
          <td class="col-md-2">
            ${value.qty > 1
              ? `<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="qtydecrement(this.id)">-</button>`
              : `<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="qtydecrement(this.id)" disabled>-</button>`            
            }
            
				    <input type="text" value="${value.qty}" min="1" max="100" disabled style="width: 25px;">
            <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="qtyincrement(this.id)">+</button> 
          </td>
          <td class="col-md-2">
            <strong>₹ ${value.subtotal}</strong>
          </td>
					<td class="col-md-1 close-btn">
						<button type="submit" id="${value.rowId}" onclick="removecart(this.id)" class="btn btn-danger"><i class="fa fa-trash"></i></button>
					</td>
          
				</tr>`
        });

        $('#mycart').html(rows)
      }
    });
  }
  mycart();

</script>

<script type="text/javascript">

  function removecart(id){
    $.ajax({
      type: 'GET',
      url: '/user/cart-remove/'+id,
      dataType: 'json',
      success: function(data){
        couponcal();
        mycart();
        minicart();
        const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) 
                      {
                        Toast.fire({
                          type: 'success',
                          icon: 'success',
                          title: data.success
                        })
                      }
                      else
                      {
                        Toast.fire({
                          type: 'error',
                          icon: 'error',
                          title: data.error
                        })
                      }

      }
    });
  }


  function qtyincrement(rowId){
    $.ajax({
      type: 'GET',
      url: '/cart-increment/'+rowId,
      dataType: 'json',
      success: function(data){
        couponcal();
        mycart();
        minicart();
      }
    });
  }

  function qtydecrement(rowId){
    $.ajax({
      type: 'GET',
      url: '/cart-decrement/'+rowId,
      dataType: 'json',
      success: function(data){
        couponcal();
        mycart();
        minicart();
      }
    });
  }


</script>

<script type="text/javascript">
  function applycoupon(){
    var coupon = $('#coupon').val();
    $.ajax({
      type: 'POST',
      dataType: 'json',
      data: {coupon: coupon},
      url: "{{ url('/coupon-apply') }}",
      success:function(data){
        couponcal();
        if (data.validity == true) {
          $('#couponfield').hide();  
        }
        
        const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) 
                      {
                        Toast.fire({
                          type: 'success',
                          icon: 'success',
                          title: data.success
                        })
                      }
                      else
                      {
                        Toast.fire({
                          type: 'error',
                          icon: 'error',
                          title: data.error
                        })
                      }
      }
    })
  }

  function couponcal(){
    $.ajax({
      type: 'GET',
      url: "{{ url('/coupon-calculation') }}",
      dataType: 'json',
      success: function(data){
        
        if (data.total) 
        {
          $('#couponcal').html(
            `<tr>
				<th>
					<div class="cart-sub-total">
						Subtotal<span class="inner-left-md">₹ ${data.total}</span>
					</div>
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md">₹ ${data.total}</span>
					</div>
				</th>
			</tr>`
          )
        }
        else
        {
          $('#couponcal').html(
          `<tr>
				<th>
					<div class="cart-sub-total">
						Subtotal<span class="inner-left-md">₹ ${data.subtotal}</span>
					</div>
          <div class="cart-sub-total">
						Coupon<span class="inner-left-md">${data.name}</span>
            <button type="submit" onclick="removecoupon()"><i class="fa fa-times"></i> </button>
					</div>
          <div class="cart-sub-total">
						Discount Amount<span class="inner-left-md">₹ ${data.discount_amount}</span>
					</div>
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md">₹ ${data.total_amount}</span>
					</div>
				</th>
			</tr>`
          )
        }
      }
    });
  }
  couponcal();
</script>

<script type="text/javascript">
  function removecoupon(){
    $.ajax({
      type: 'GET',
      url: "{{ url('/coupon-remove') }}",
      dataType: 'json',
      success: function(data){
        couponcal();
        $('#couponfield').show();
        const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) 
                      {
                        Toast.fire({
                          type: 'success',
                          icon: 'success',
                          title: data.success
                        })
                      }
                      else
                      {
                        Toast.fire({
                          type: 'error',
                          icon: 'error',
                          title: data.error
                        })
                      }
      }
    });
  }
</script>

</body>
</html>