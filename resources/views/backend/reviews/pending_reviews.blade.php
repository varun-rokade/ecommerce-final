@extends('admin.admin_master')

@section('title')
    Pending Reviews
@endsection

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
                <h3 class="box-title">Pending Reviews</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>User</th>
                              <th>Product Name</th>
                              <th>Summary</th>
                              <th>Comment</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($reviews as $item)
                              <tr>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->product->product_name_en }}</td>
                                <td>{{ $item->summary }}</td>
                                <td>{{ $item->comment }}</td>
                                <td>
                                    @if ($item->status == 0)
                                    <span class="badge badge-danger-light">Pending</span>    
                                    @endif
                                </td>
                                <td width="40%">
                                    <a href="{{ route('review.approve', $item->id) }}" class="btn btn-danger" title="View">Approve Request</a>
                                    
                                </td>
                              </tr>
                          @endforeach
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>User</th>
                            <th>Product Name</th>
                            <th>Summary</th>
                            <th>Comment</th>
                            <th>Status</th>
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