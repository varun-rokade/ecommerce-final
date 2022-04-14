@extends('frontend.master_home')

@section('title')
    My Cart
@endsection

@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>My Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
                    <th class="cart-description item">Image</th>
                    <th class="cart-product-name item">Product Name</th>
					
					<th class="cart-edit item">Color</th>
                    <th>Size</th>
					<th class="cart-qty item">Quantity</th>
                    <th class="cart-sub-total item">Subtotal</th>
                    <th class="cart-romove item">Remove</th>
				</tr>
			</thead>
			<tbody id="mycart">
                
			</tbody>
		</table>
	</div>
                    </div>
</div>			</div><!-- /.row -->

<div class="col-md-4 col-sm-12 cart-shopping-total">
</div>
<div class="col-md-4 col-sm-12 estimate-ship-tax">
	@if (Session::has('coupon'))
		
	@else
	<table class="table" id="couponfield">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Discount Code</span>
					<p>Enter your coupon code if you have one..</p>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div class="form-group">
							<input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon.." id="coupon">
						</div>
						<div class="clearfix pull-right">
							<button type="submit" class="btn-upper btn btn-primary" onclick="applycoupon()">APPLY COUPON</button>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
	@endif
</div><!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table">
		<thead id="couponcal">
			
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<a href="{{ route('checkout') }}" type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
							
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.cart-shopping-total -->
		</div><!-- /.sigin-in-->
</div></div><!-- /.body-content -->
<br><br>
@endsection