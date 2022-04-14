@extends('frontend.master_home')

@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')
            
            <div class="col-md-10">
                <div class="table-responsive">
                    <br><table class="table">
                        <tbody>
                            <tr style="background: #e2e2e2;">
                                <td class="col-md-1">
                                    <label for="">Order Date</label>
                                </td>
                                {{-- <td class="col-md-1">
                                    <label for="">Product Name</label>
                                </td> --}}
                                <td class="col-md-3">
                                    <label for="">Total Amount</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Invoice Number</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Order Status</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">Action</label>
                                </td>
                            </tr>

                            @foreach ($orders as $order)
                            <tr>
                                <td class="col-md-1">
                                    <label for="">{{ $order->order_date }}</label>
                                </td>

                                {{-- @php
                                    
                                    if($item = App\Models\OrderItem::where('order_id', $order->id)->first())
                                    {
                                        $product = $item->product_name;
                                    }
                                @endphp
                                <td class="col-md-1">
                                    <label for="">{{ $product }}</label>
                                </td> --}}
                                <td class="col-md-3">
                                    <label for="">₹ {{ $order->amount }}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{ $order->invoice_number }}</label>
                                </td>
                                <td class="col-md-2">
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
                                <td class="col-md-1" width="30%">
                                    <a href="{{ url('user/order_details/'.$order->id) }}" class="btn btn-sm btn-primary" title="View"><i class="fa fa-eye"> View</i></a>
                                    <a target="_blank" href="{{ url('user/invoice/'.$order->id) }}" class="btn btn-sm btn-danger" title="Invoice" style="margin-top: 5px;"><i class="fa fa-download"> Invoice</i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection