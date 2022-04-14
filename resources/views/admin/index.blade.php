@extends('admin.admin_master')

@section('title')
    Admin - Dashboard
@endsection

@section('admin')

@php
    $date = date('Y-m-d');
    $today = App\Models\Order::where('order_date', $date)->sum('amount');

    $mon = date('m');
    $year = date('Y');
    $month = App\Models\Order::whereMonth('order_date', $mon)->whereYear('order_date', $year)->sum('amount');
    $sale = App\Models\Order::whereYear('order_date', $year)->sum('amount');

    $pending = App\Models\Order::where('status', 'Pending')->get();
@endphp

<section class="content">
    <div class="row">
        <div class="col-xl-3 col-6">
            <div class="box overflow-hidden pull-up">
                <div class="box-body">							
                    <div class="icon bg-primary-light rounded w-60 h-60">
                        <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                    </div>
                    <div>
                        <p class="text-mute mt-20 mb-0 font-size-16">Today's Sales</p>
                        <h3 class="text-white mb-0 font-weight-500">₹ {{ $today }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-6">
            <div class="box overflow-hidden pull-up">
                <div class="box-body">							
                    <div class="icon bg-warning-light rounded w-60 h-60">
                        <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                    </div>
                    <div>
                        <p class="text-mute mt-20 mb-0 font-size-16">Monthly Sales</p>
                        <h3 class="text-white mb-0 font-weight-500">₹ {{ $month }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-6">
            <div class="box overflow-hidden pull-up">
                <div class="box-body">							
                    <div class="icon bg-info-light rounded w-60 h-60">
                        <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                    </div>
                    <div>
                        <p class="text-mute mt-20 mb-0 font-size-16">Yearly Sales</p>
                        <h3 class="text-white mb-0 font-weight-500">₹ {{ $sale }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-6">
            <div class="box overflow-hidden pull-up">
                <div class="box-body">							
                    <div class="icon bg-danger-light rounded w-60 h-60">
                        <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                    </div>
                    <div>
                        <p class="text-mute mt-20 mb-0 font-size-16">Pending Orders</p>
                        <h3 class="text-white mb-0 font-weight-500">{{ count($pending) }}</h3>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <h4 class="box-title align-items-start flex-column">
                        Recent Orders
                    </h4>

                    @php
                        $orders = App\Models\Order::orderBy('order_date', 'DESC')->limit(10)->get();
                    @endphp

                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-border">
                            <thead>
                                <tr class="text-uppercase bg-lightest">
                                    <th style="min-width: 250px"><span class="text-white">Order Date</span></th>
                                    <th style="min-width: 100px"><span class="text-fade">Invoice Number</span></th>
                                    <th style="min-width: 100px"><span class="text-fade">Amount</span></th>
                                    <th style="min-width: 150px"><span class="text-fade">Payment Type</span></th>
                                    <th style="min-width: 130px"><span class="text-fade">Order Status</span></th>
                                    <th style="min-width: 120px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($orders as $item)    
                                
                                <tr>										
                                    <td class="pl-0 py-8">
                                        <div class="d-flex align-items-center">

                                            <div>
                                                <a class="text-white font-weight-600 hover-primary mb-1 font-size-16">{{ Carbon\Carbon::parse($item->order_date)->diffForHumans() }}</a>
                                                {{-- <span class="text-fade d-block">Pharetra, Nulla , Nec, Aliquet</span> --}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{-- <span class="text-fade font-weight-600 d-block font-size-16">
                                            Paid
                                        </span> --}}
                                        <span class="text-white font-weight-600 d-block font-size-16">
                                            {{ $item->invoice_number }}
                                        </span>
                                    </td>
                                    <td>
                                        {{-- <span class="text-fade font-weight-600 d-block font-size-16">
                                            Paid
                                        </span> --}}
                                        <span class="text-white font-weight-600 d-block font-size-16">
                                            ₹ {{ $item->amount }}
                                        </span>
                                    </td>
                                    <td>
                                        {{-- <span class="text-fade font-weight-600 d-block font-size-16">
                                            Sophia
                                        </span> --}}
                                        <span class="text-white font-weight-600 d-block font-size-16">
                                            {{ $item->payment_type }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($item->status == 'Delivered')
                                        <span class="badge badge-success-light badge-lg">{{ $item->status }}</span>
                                        @elseif ($item->status == 'Cancelled')
                                        <span class="badge badge-danger-light badge-lg">{{ $item->status }}</span>
                                        @elseif ($item->status == 'Returned')
                                        <span class="badge badge-danger-light badge-lg">{{ $item->status }}</span>
                                        @else
                                        <span class="badge badge-primary-light badge-lg">{{ $item->status }}</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('pending.order.details', $item->id) }}" class="fa fa-eye btn btn-primary" title="view"></a>
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
</section>

@endsection