@extends('admin.admin_master')

@section('title')
    Root Category Edit
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
                 <h3 class="box-title">Update Root Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="id" value="{{ $category->id }}">
                                    <div class="form-group">
                                        <h5>Category Name(English) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_en" id="category_name_en" class="form-control"
                                                data-validation-required-message="This field is required"
                                                value="{{ $category->category_name_en }}">
                                                @error('category_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Category Name(Hindi) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_hin" id="category_name_hin" class="form-control"
                                                data-validation-required-message="This field is required"
                                                value="{{ $category->category_name_hin }}">
                                                @error('category_name_hin')
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