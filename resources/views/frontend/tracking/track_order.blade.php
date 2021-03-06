@extends('frontend.master_home')

@section('title')
    Track Order
@endsection

@section('content')

<style>
    body {
     background-color: #eeeeee;
     font-family: 'Open Sans', serif
 }

 .container {
     
 }

 .card {
     position: relative;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     -webkit-box-orient: vertical;
     -webkit-box-direction: normal;
     -ms-flex-direction: column;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: #fff;
     background-clip: border-box;
     border: 1px solid rgba(0, 0, 0, 0.1);
     border-radius: 0.10rem
 }

 .card-header:first-child {
     border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
 }

 .card-header {
     padding: 0.75rem 1.25rem;
     margin-bottom: 0;
     background-color: #fff;
     border-bottom: 1px solid rgba(0, 0, 0, 0.1)
 }

 .track {
     position: relative;
     background-color: #ddd;
     height: 7px;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     margin-bottom: 60px;
     margin-top: 50px
 }

 .track .step {
     -webkit-box-flex: 1;
     -ms-flex-positive: 1;
     flex-grow: 1;
     width: 25%;
     margin-top: -18px;
     text-align: center;
     position: relative
 }

 .track .step.active:before {
     background: #157ed2
 }

 .track .step::before {
     height: 7px;
     position: absolute;
     content: "";
     width: 100%;
     left: 0;
     top: 18px
 }

 .track .step.active .icon {
     background: #157ed2;
     color: #fff
 }

 .track .icon {
     display: inline-block;
     width: 40px;
     height: 40px;
     line-height: 40px;
     position: relative;
     border-radius: 100%;
     background: #ddd
 }

 .track .step.active .text {
     font-weight: 400;
     color: #000
 }

 .track .text {
     display: block;
     margin-top: 7px
 }

 .itemside {
     position: relative;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     width: 100%
 }

 .itemside .aside {
     position: relative;
     -ms-flex-negative: 0;
     flex-shrink: 0
 }

 .img-sm {
     width: 80px;
     height: 80px;
     padding: 7px
 }

 ul.row,
 ul.row-sm {
     list-style: none;
     padding: 0
 }

 .itemside .info {
     padding-left: 15px;
     padding-right: 7px
 }

 .itemside .title {
     display: block;
     margin-bottom: 5px;
     color: #212529
 }

 p {
     margin-top: 0;
     margin-bottom: 1rem
 }

 .btn-warning {
     color: #ffffff;
     background-color: #ee5435;
     border-color: #ee5435;
     border-radius: 1px
 }

 .btn-warning:hover {
     color: #ffffff;
     background-color: #ff2b00;
     border-color: #ff2b00;
     border-radius: 1px
 }

</style>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<div class="container">
    <article class="card">
        <header class="card-header" style="margin-left: 20px;"> <a href="{{ route('my.orders') }}">My Orders</a> / Tracking </header>
        <div class="card-body">
            {{-- <h6>Order ID: OD45345345435</h6> --}}
            <div class="row" style="margin-left: 30px; margin-top: 20px;">
                <div class="col-md-2">
                    <b>Invoice Number: </b>{{ $track->invoice_number }}
                </div>
                <div class="col-md-2">
                    <b>Order Date: </b>{{ $track->order_date }}
                </div>
                <div class="col-md-2">
                    <b>Customer Name: </b>{{ $track->name }}
                </div>
                <div class="col-md-2">
                    <b>Phone Number: </b>{{ $track->phone }}
                </div>
                <div class="col-md-2">
                    <b>Payment Method: </b>{{ $track->payment_type }}
                </div>
                <div class="col-md-2">
                    <b>Total Amount: </b>??? {{ $track->amount }}
                </div>
            </div>
            <div class="row" style="margin-left: 30px; margin-top: 20px;">
                <div class="col-md-6">
                    <b>Address: </b>{{ $track->address }}
                    <br><b>Postal Code: </b>{{ $track->postal_code }}
                    <br><b>City: </b>{{ $track->city->name }}
                    <br><b>State: </b>{{ $track->state->name }}
                </div>
            </div>
            {{-- <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br>29 nov 2019 </div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> BLUEDART, | <i class="fa fa-phone"></i> +1598675986 </div>
                    <div class="col"> <strong>Status:</strong> <br> Picked by the courier </div>
                    <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div>
                </div>
            </article> --}}
            <div class="track">
                @if ($track->status == 'Confirmed')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order processed</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Order Shipped </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check-circle"></i> </span> <span class="text">Order Delivered</span> </div>
                @elseif ($track->status == 'Processing')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order processed</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Order Shipped </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check-circle"></i> </span> <span class="text">Order Delivered</span> </div>
                @elseif ($track->status == 'Shipped')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order processed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Order Shipped </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check-circle"></i> </span> <span class="text">Order Delivered</span> </div>
                @elseif ($track->status == 'Delivered')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order processed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Order Shipped </span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check-circle"></i> </span> <span class="text">Order Delivered</span> </div>
                @endif
            </div>
            <hr><br><br>
            
            
        </div>
    </article>
</div>

@endsection