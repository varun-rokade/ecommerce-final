@extends('frontend.master_home')

@section('title')
    Checkout
@endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		

				<!-- guest-login -->			
				<div class="col-md-6 col-sm-6 already-registered-login">
					<h4 class="checkout-subtitle"><b>Shipping Address</b></h4>
					
					<form class="register-form" action="{{ route('checkout.store') }}" method="POST">
					  @csrf
					  <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1"><b>Name: <span>*</span></b></label>
					    <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Name" value="{{ Auth::user()->name }}" required>
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1"><b>Email: <span>*</span></b></label>
					    <input type="email" name="shipping_email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email" value="{{ Auth::user()->email }}" required>
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1"><b>Phone: <span>*</span></b></label>
					    <input type="text" name="shipping_phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Phone" value="{{ Auth::user()->phone }}" required>
					  </div>
                      <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1"><b>Postal Code: <span>*</span></b></label>
					    <input type="text" name="postal_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Postal Code" required>
					  </div>
					
				</div>	
				<!-- guest-login -->

				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">
				
					  <br><br><div class="form-group">
						<b>State: <span class="text-danger">*</span></b>
					    <select id="state-dd" name="state" class="form-control">
                            <option value="">Select State</option>
                            @foreach ($data as $state)
                            <option value="{{ $state->id }}">
                                {{ $state->name }}
                            </option>
                            @endforeach
                        </select>
					  </div>
					  <div class="form-group">
						<b>City: <span class="text-danger">*</span></b>
							<select id="city-dd" name="city" class="form-control">
							</select>
					  </div>
					  <div class="form-grou">
						  <b>Address: <span class="text-danger">*</span></b><br>
						  <textarea name="address" id="" cols="40" rows="5" required></textarea>
					  </div>
					  
					
				</div>	
				<!-- already-registered-login -->		

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
					    
					  	
					</div><!-- /.checkout-steps -->
				</div>
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">
					@foreach ($cart as $item)
                    <li>
                        <strong>Image: </strong>
                        <img src="{{ asset($item->options->image) }}" style="height: 50px; width: 50px;" alt="">
                    </li>
					<br><li><strong>Quantity: </strong>{{ $item->qty }}</li>
                    @if ($item->options->color !== null)
					<br><li><strong>Color: </strong>{{ $item->options->color }}</li>
                    @endif
                    @if ($item->options->size !== null)
					<br><li><strong>Size: </strong>{{ $item->options->size }}</li>
                    @endif
                    @endforeach
                    @if (Session::has('coupon'))
                    <br><li><strong>Subtotal: </strong>₹ {{ $carttotal }}</li><hr>
                    <li><strong>Coupon: </strong>{{ session::get('coupon')['name'] }} ({{ session::get('coupon')['discount'] }}%)</li>    
                    <br><li><strong>Discount: </strong>₹ {{ session::get('coupon')['discount_amount'] }}</li>
                    <br><li><strong>Grand Total: </strong>₹ {{ session::get('coupon')['total_amount'] }}</li>
                    @else
                    <br><li><strong>Subtotal: </strong>₹ {{ $carttotal }}</li><hr>
                    <li><strong>Grand Total: </strong>₹ {{ $carttotal }}</li>    
                    @endif
                    
				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->				</div>

<div class="col-md-4">
	<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
<div class="panel-group">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="unicase-checkout-title">Select Payment Method</h4>
</div>
<div class="row">
	<div class="col-md-4">
		<label for="">Stripe</label>
		<input type="radio" name="payment_method" value="stripe" id="" required>
		<img src="{{ asset('frontend/assets/images/payments/4.png') }}" alt="">
	</div>
	{{-- <div class="col-md-4">
		<label for="">Card</label>
		<input type="radio" name="payment_method" value="card" id="">
		<img src="{{ asset('frontend/assets/images/payments/3.png') }}" alt="">
	</div> --}}
	<div class="col-md-4">
		<label for="">Cash On Delivery</label>
		<input type="radio" name="payment_method" value="cash on delivery" id="">
		<img src="{{ asset('frontend/assets/images/payments/6.png') }}" alt="">
	</div>
</div>
<hr><button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment</button>
</div>
</div>
</div> 
<!-- checkout-progress-sidebar -->				</div>
</form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->

<script>
	$(document).ready(function () {
		$('#state-dd').on('change', function () {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{url('/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dd').html('<option value="">Select City</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
</script>

@endsection