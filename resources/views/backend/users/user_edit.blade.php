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
                 <h3 class="box-title">Update User</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <div class="form-group">
                                        <h5>Profile Photo </h5>
                                        <div class="controls">
                                            <input type="file" name="profile_photo_path" class="form-control"
                                                data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control"
                                                data-validation-required-message="This field is required"
                                                value="{{ $user->name }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Email <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control"
                                                data-validation-required-message="This field is required"
                                                value="{{ $user->email }}">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Phone Number <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="phone" class="form-control"
                                                data-validation-required-message="This field is required"
                                                value="{{ $user->phone }}">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                            
                            
                                <div class="col-md-6">
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-primary mb-5" value="Update">
                                    </div>
                                </div>
                            
                </form>
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