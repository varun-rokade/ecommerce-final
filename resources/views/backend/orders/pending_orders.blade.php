@extends('admin.admin_master')

@section('admin')

<!-- Content Wrapper. Contains page content -->
{{-- <div class="content-wrapper"> --}}
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">
        <div class="row">
            

         

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Pending Orders</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Order Date</th>
                              <th>Invoice Number</th>
                              <th>Amount</th>
                              <th>Payment Type</th>
                              <th>Order Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($orders as $item)
                              <tr>
                                <td>{{ $item->order_date }}</td>
                                <td>{{ $item->invoice_number }}</td>
                                <td>₹ {{ $item->amount }}</td>
                                <td>{{ $item->payment_type }}</td>
                                <td><span class="badge badge-primary-light">{{ $item->status }}</span></td>
                                <td width="40%">
                                    <a href="{{ route('pending.order.details', $item->id) }}" class="fa fa-eye btn btn-primary" title="Edit data"></a>
                                    
                                    
                                </td>
                              </tr>
                          @endforeach
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>Order Date</th>
                            <th>Invoice Number</th>
                            <th>Amount</th>
                            <th>Payment Type</th>
                            <th>Order Status</th>
                            <th>Action</th>
                          </tr>
                      </tfoot>
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

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