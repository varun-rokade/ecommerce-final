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
                 <h3 class="box-title">Update Slider</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                <form action="{{ route('slider.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="id" value="{{ $slider->id }}">
                            <input type="hidden" name="old_image" value="{{ $slider->image }}"> 
                            <div class="form-group">
                                <h5>Title </h5>
                                <div class="controls">
                                    <input type="text" name="title" id="title" class="form-control"
                                        data-validation-required-message="This field is required"
                                        value="{{ $slider->title }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Description </h5>
                                <div class="controls">
                                    <input type="text" name="des" id="des" class="form-control"
                                        data-validation-required-message="This field is required"
                                        value="{{ $slider->des }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Slider Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="image" id="image" class="form-control"
                                        data-validation-required-message="This field is required"
                                        value="">
                                        @error('image')
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