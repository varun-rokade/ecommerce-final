@extends('admin.admin_master')

@section('title')
    Edit Category
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
                 <h3 class="box-title">Update Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                <form action="{{ route('subcategory.update', $sub->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="id" value="{{ $sub->id }}">
                                    <div class="form-group">
                                        <h5>Category Name(English) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_en" id="subcategory_name_en" class="form-control"
                                                data-validation-required-message="This field is required"
                                                value="{{ $sub->subcategory_name_en }}">
                                                @error('subcategory_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Category Name(Hindi) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_hin" id="subcategory_name_hin" class="form-control"
                                                data-validation-required-message="This field is required"
                                                value="{{ $sub->subcategory_name_hin }}">
                                                @error('subcategory_name_hin')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Parent Category <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" id="category_id" class="form-control" aria-invalid="false">
                                                <option value="" selected="" disabled="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id == $sub->category_id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>    
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <h5>Sub Category Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="category_image" id="category_image" class="form-control"
                                                data-validation-required-message="This field is required"
                                                value="">
                                                @error('category_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div> --}}
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