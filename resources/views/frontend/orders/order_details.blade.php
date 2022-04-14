@extends('frontend.master_home')

@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')
            
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <br><h4>
                            Shipping Details
                        </h4>
                        <hr>
                    </div>
                    <div class="card-body" style="background: #E9EBEC;">
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

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <br><h4>
                            Order Details
                        </h4>
                        
                        <hr>
                    </div>
                    <div class="card-body" style="background: #E9EBEC;">
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
                                <td>
                                    @if($order->status == 'Delivered')
                                    @if ($order->return_order == 0)
                                    <span class="badge badge-primary-light" style="background: #33cc33">{{ $order->status }}</span>
                                    @elseif($order->return_order == 1)
                                    <span class="badge badge-primary-light" style="background: #ff0000">Request Pending</span>                                        
                                    @else
                                    <span class="badge badge-primary-light" style="background: #33cc33">Return Approved</span>
                                    @endif
                                    
                                    @elseif($order->status == 'Cancelled')
                                    <span class="badge badge-primary-light" style="background: #ff0000">{{ $order->status }}</span>
                                    @elseif($order->status == 'Returned')
                                    <span class="badge badge-primary-light" style="background: #33cc33">{{ $order->status }}</span>
                                    @else
                                    <span class="badge badge-primary-light" style="background: #418DB9">{{ $order->status }}</span>
                                    
                                    @endif
                                    @if($order->return_reason && $order->return_order == 1)
                                    <span class="badge badge-primary-light" style="background: #ff0000">Return Requested</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                @if($order->status !== 'Delivered' && $order->status !== 'Returned' && $order->status !== 'Cancelled')
                                <th>Cancel Order: </th>
                                <td>
                                    
                                    <form action="{{ route('order.cancel', $order->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger" id="cancelled">Cancel</button>
                                    </form>
                                    
                                </td>
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <br><h4>Product Details</h4><hr>
                    <div class="table-responsive">
                        <br><table class="table">
                            <tbody>
                                <tr style="background: #e2e2e2;">
                                    <td class="col-md-1">
                                        <label for="">Image</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">Product Name</label>
                                    </td>
                                    <td class="col-md-3">
                                        <label for="">Product Code</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Color</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Size</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">Quantity</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">Price</label>
                                    </td>
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
            <hr>
            
            @if($order->status == 'Delivered' && $order->return_reason == NULL)
            <h4>Return Order</h4><hr>
            <form action="{{ route('return.order', $order->id) }}" method="POST">
                @csrf
            <div class="form-group">
                <label for="">Order Return Reason: </label>
                <textarea name="return_reason" id="" class="form-control" cols="30" rows="5"></textarea>
                <br><button type="submit" class="btn btn-danger">Return Order</button>
            </div>
            </form>
            @else
            @endif
        </div>
    </div>
</div>

@endsection