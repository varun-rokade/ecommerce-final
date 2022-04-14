@extends('admin.admin_master')

@section('title')
    Edit Brand
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
                 <h3 class="box-title">Update Brand</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                <form action="{{ route('brand.update', $brands->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="id" value="{{ $brands->id }}">
                            <input type="hidden" name="old_image" value="{{ $brands->brand_image }}"> 
                                    <div class="form-group">
                                        <h5>Brand Name(English) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_en" id="brand_name_en" class="form-control"
                                                data-validation-required-message="This field is required"
                                                value="{{ $brands->brand_name_en }}">
                                                @error('brand_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Brand Name(Hindi) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_hin" id="brand_name_hin" class="form-control"
                                                data-validation-required-message="This field is required"
                                                value="{{ $brands->brand_name_hin }}">
                                                @error('brand_name_hin')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Brand Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="brand_image" id="brand_image" class="form-control"
                                                data-validation-required-message="This field is required"
                                                value="">
                                                @error('brand_image')
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