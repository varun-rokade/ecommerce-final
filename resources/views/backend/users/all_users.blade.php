@extends('admin.admin_master')

@section('title')
    Users
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
                <h3 class="box-title">Total Users: {{ count($users) }}</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Profile Photo</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($users as $user)
                              <tr>
                                <td><img src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/no_image.jpg') }}" alt="" style="width: 50px; height: 50px"></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                @if ($user->UserOnline())
                                <td><span class="badge badge-success-light">Online</span></td>    
                                @else
                                {{-- <td><span class="badge badge-danger-light">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span></td> --}}
                                <td><span class="badge badge-danger-light">Offline</span></td>
                                @endif
                                <td><a href="{{ route('user.edit', $user->id) }}" class="fa fa-pencil btn btn-primary" title="Edit data"></a>
                                    <a href="{{ route('user.delete', $user->id) }}" id="delete" class="fa fa-trash btn btn-danger" title="Delete data"></a>
                                </td>
                              </tr>
                          @endforeach
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>Profile Photo</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
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