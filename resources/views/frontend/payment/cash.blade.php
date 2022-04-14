@extends('frontend.master_home')

@section('title')
    Cash On Delivery
@endsection

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>Cash On Delivery</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Payment</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">
					
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

<div class="col-md-6">
	<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
<div class="panel-group">
<div class="panel panel-default">
<div class="panel-heading">
{{-- <h4 class="unicase-checkout-title">Payment</h4> --}}
</div>
<form action="{{ route('cash.order') }}" method="post" id="payment-form">
    @csrf
<div class="form-row">
    <label for="card-element">
    <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
    <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
    <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
    <input type="hidden" name="postal_code" value="{{ $data['postal_code'] }}">
    <input type="hidden" name="state_id" value="{{ $data['state'] }}">
    <input type="hidden" name="city_id" value="{{ $data['city'] }}">
    <input type="hidden" name="address" value="{{ $data['address'] }}">
    </label>
     
    
    <!-- Used to display form errors. -->
</div>

<button class="btn btn-primary">Place Order</button>
</form>
</div>
</div>
</div> 
<!-- checkout-progress-sidebar -->				</div>
 
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->


@endsection