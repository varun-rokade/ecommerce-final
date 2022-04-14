@extends('admin.admin_master')

@section('admin')

<!-- Content Wrapper. Contains page content -->
{{-- <div class="content-wrapper"> --}}
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 >Order Details</h3>
                
            </div>
        </div>
    </div>

      <!-- Main content -->
      <section class="content">
        <div class="row">
            
            

            <div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Shipping Details</strong></h4>
				  </div>
				  <div class="box-body">
					<table class="table">
                        <tr>
                            <th>Name: </th>
                            <td>{{ $order->name }}</td>
                        </tr>
                        <tr>
                            <th>Email: </th>
                            <td>{{ $order->email }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number: </th>
                            <td>{{ $order->phone }}</td>
                        </tr>
                        <tr>
                            <th>Address: </th>
                            <td>{{ $order->address }}</td>
                        </tr>
                        <tr>
                            <th>Postal Code: </th>
                            <td>{{ $order->postal_code }}</td>
                        </tr>
                        <tr>
                            <th>City: </th>
                            <td>{{ $order->city->name }}</td>
                        </tr>
                        <tr>
                            <th>State: </th>
                            <td>{{ $order->state->name }}</td>
                        </tr>
                        <tr>
                            <th>Order Date: </th>
                            <td>{{ $order->order_date }}</td>
                        </tr>
                    </table>
				  </div>
				</div>
			  </div>

              <div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Order Details</strong></h4>
				  </div>
				  <div class="box-body">
					<table cellspacing="0" cellpadding="0" class="table" style="table-layout: fixed; width: 100%"> 
                        <tr>
                            <th>Name: </th>
                            <td>{{ $order->user->name }}</td>
                        </tr>
                        
                        <tr>
                            <th>Phone Number: </th>
                            <td>{{ $order->user->phone }}</td>
                        </tr>
                                                
                        <tr>
                            <th>Payment Type: </th>
                            <td>{{ $order->payment_type }}</td>
                        </tr>
                        <tr>
                            <th>Invoice Number: </th>
                            <td>{{ $order->invoice_number }}</td>
                        </tr>
                        @if ($order->transaction_id)
                        <tr>
                            <th>Transaction ID: </th>
                            <td style="word-break:break-word">{{ $order->transaction_id }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Total Amount: </th>
                            <td>₹ {{ $order->amount }}</td>
                        </tr>
                        <tr>
                            <th>Order Status: </th>
                            <td><span class="badge badge-primary-light">{{ $order->status }}</span></td>
                        </tr>
                        <tr>
                            
                                @if ($order->status == 'Pending')
                                    <td><a href="{{ route('pendingtoconfirm', $order->id) }}" class="btn btn-primary" id="confirm">Confirm Order</a></td>
                                    <td><a href="{{ route('cancelorder', $order->id) }}" class="btn btn-danger" id="cancelled">Cancel Order</a></td>
                                @elseif ($order->status == 'Confirmed')
                                    <td><a href="{{ route('confirmtoprocessing', $order->id) }}" class="btn btn-primary" id="processing">Process Order</a></td>
                                    <td><a href="{{ route('cancelorder', $order->id) }}" class="btn btn-danger" id="cancelled">Cancel Order</a></td>
                                @elseif ($order->status == 'Processing')
                                    <td><a href="{{ route('processingtoshipped', $order->id) }}" class="btn btn-primary" id="shipped">Ship Order</a></td>
                                    <td><a href="{{ route('cancelorder', $order->id) }}" class="btn btn-danger" id="cancelled">Cancel Order</a></td>
                                @elseif ($order->status == 'Shipped')
                                    <td><a href="{{ route('shippedtodelivered', $order->id) }}" class="btn btn-primary" id="delivered">Deliver Order</a></td>
                                    <td><a href="{{ route('cancelorder', $order->id) }}" class="btn btn-danger" id="cancelled">Cancel Order</a></td>
                                @endif
                            
                        </tr>
                    </table>
				  </div>
				</div>
			  </div>

              <div class="col-md-12 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Product Details</strong></h4>
				  </div>
				  <div class="box-body">
					<table class="table">
                        <tbody>
                            <tr>
                                <th class="col-md-1">
                                    <label for="">Image</label>
                                </th>
                                <th class="col-md-1">
                                    <label for="">Product Name</label>
                                </th>
                                <th class="col-md-3">
                                    <label for="">Product Code</label>
                                </th>
                                <th class="col-md-2">
                                    <label for="">Color</label>
                                </th>
                                <th class="col-md-2">
                                    <label for="">Size</label>
                                </th>
                                <th class="col-md-1">
                                    <label for="">Quantity</label>
                                </th>
                                <th class="col-md-1">
                                    <label for="">Price</label>
                                </th>
                            </tr>

                            @foreach ($orderitem as $item)
                            <tr>
                                <td class="col-md-1">
                                    <img src="{{ asset($item->product->product_thumbnail) }}" height="50px" width="50px">
                                </td>

                                <td class="col-md-1">
                                    <label for="">{{ $item->product->product_name_en }}</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">{{ $item->product->product_code }}</label>
                                </td>
                                @if ($item->color)
                                <td class="col-md-2">
                                    <label for="">{{ $item->color }}</label>
                                </td>
                                @else
                                <td class="col-md-2">
                                    <label for="">-</label>
                                </td>
                                @endif
                                @if ($item->size)
                                <td class="col-md-2">
                                    <label for="">{{ $item->size }}</label>
                                </td>
                                @else
                                <td class="col-md-2">
                                    <label for="">-</label>
                                </td>
                                @endif
                                <td class="col-md-2">
                                    <label for="">{{ $item->qty }}</label>
                                </td>
                                <td class="col-md-5" width="30%">
                                    <label for="">₹ {{ $item->price * $item->qty }} ({{ $item->price }} * {{ $item->qty }})</label>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
				  </div>
				</div>
			  </div>

          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
{{-- </div> --}}
<!-- /.content-wrapper -->

@endsection