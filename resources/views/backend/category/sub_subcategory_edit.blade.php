@extends('admin.admin_master')

@section('title')
    Sub Category Edit
@endsection

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                 <h3 class="box-title">Update Sub Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                <form action="{{ route('subsubcategory.update') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="id" value="{{ $subsub->id }}">
                                
                                    <div class="form-group">
                                        <h5>Category Name(English) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name_en" id="subsubcategory_name_en" class="form-control"
                                                data-validation-required-message="This field is required"
                                                value="{{ $subsub->subsubcategory_name_en }}">
                                                @error('subsubcategory_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Category Name(Hindi) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name_hin" id="subsubcategory_name_hin" class="form-control"
                                                data-validation-required-message="This field is required"
                                                value="{{ $subsub->subsubcategory_name_hin }}">
                                                @error('subsubcategory_name_hin')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Root Category <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" id="category_id" class="form-control" aria-invalid="false">
                                                <option value="" selected="" disabled="">Select Root Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"  {{ $category->id == $subsub->category_id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>    
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Parent Category <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id" id="subcategory_id" class="form-control" aria-invalid="false">
                                                <option value="" selected="" disabled="">Select Category</option>
                                                @foreach ($sub as $subcategory)
                                                    <option value="{{ $subcategory->id }}" {{ $subcategory->id == $subsub->subcategory_id ? 'selected' : '' }}>{{ $subcategory->subcategory_name_en }}</option>    
                                                @endforeach
                                            </select>
                                            @error('subcategory_id')
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

{{-- <script type="text/javascript">

$(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });

</script> --}}

@endsection