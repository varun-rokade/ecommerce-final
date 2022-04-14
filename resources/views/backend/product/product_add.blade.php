@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3>Add Product</h3>
              </div>
          </div>
      </div>	  

      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box box-outline-primary">
          <div class="box-header with-border">
            <h4 class="box-title">Enter product details</h4>
            
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="POST" enctype="multipart/form-data" action="{{ route('product.store') }}">
                    @csrf
                    <div class="row">
                      <div class="col-12">						
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Brand <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="brand_id" id="brand_id" class="form-control" required aria-invalid="false">
                                            <option value="" selected="" disabled="">Select Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->brand_name_en }}</option>    
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Root Category <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" id="category_id" class="form-control" required aria-invalid="false">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>    
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Category <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subcategory_id" id="subcategory_id" class="form-control" aria-invalid="false" required>
                                            <option value="" selected="" disabled="">Select Sub Category</option>
                                        </select>
                                        @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Sub Category <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subsubcategory_id" id="subsubcategory_id" class="form-control" required aria-invalid="false">
                                            <option value="" selected="" disabled="">Select Brand</option>
                                        </select>
                                        @error('subsubcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Name(English) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_en" class="form-control" required> </div>
                                        @error('product_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Name(Hindi) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_hin" class="form-control" required> </div>
                                        @error('product_name_hin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Code <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_code" class="form-control" required> </div>
                                        @error('product_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_qty" class="form-control" required> </div>
                                        @error('product_qty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Tags(English) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_en" required data-role="tagsinput" placeholder="Product Tags(English)"/> </div>
                                        @error('product_tags_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Tags(Hindi) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_tags_hin" required placeholder="Product Tags(Hindi)" data-role="tagsinput"/> </div>
                                            @error('product_tags_hin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                            </div>

                            <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Size(English) </h5>
                                        <div class="controls">
                                            <input type="text" name="product_size_en" value="Small,Medium,Large" data-role="tagsinput"/> </div>
                                            @error('product_size_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                            </div>

                            <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Size(Hindi) </h5>
                                        <div class="controls">
                                            <input type="text" name="product_size_hin" placeholder="Product Size(Hindi)" data-role="tagsinput"/> </div>
                                            @error('product_size_hin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                            </div>

                        </div>
                          
                        <div class="row">
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Color(English) </h5>
                                        <div class="controls">
                                            <input type="text" name="product_color_en" value="Red,Black,Blue" data-role="tagsinput"/> </div>
                                            @error('product_color_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                            </div>

                            <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Color(Hindi) </h5>
                                        <div class="controls">
                                            <input type="text" name="product_color_hin" placeholder="Product Color(Hindi)" data-role="tagsinput"/> </div>
                                            @error('product_color_hin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Selling Prize <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="selling_price" required class="form-control"> </div>
                                        @error('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Discount Price </h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="discount_price"/> </div>
                                            @error('discount_price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Thumbnail </h5>
                                    <div class="controls">
                                        <input type="file" class="form-control" name="product_thumbnail" onchange="mainthumbnail(this)"/>
                                        @error('product_thumbnail')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <img src="" id="thumbnail" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Images </h5>
                                    <div class="controls">
                                        <input type="file" class="form-control" name="multi_img[]" id="multiimg" multiple/>
                                        @error('multi_img')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="row" id="preview"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Short Description(English) </h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="short_des_en"/> </div>
                                            @error('short_des_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Short Description(Hindi) </h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="short_des_hin"/> </div>
                                        @error('short_des_hin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Long Description(English) </h5>
                                        <div class="controls">
                                            <textarea id="editor1" name="long_des_en" rows="10" cols="80">
						                    </textarea>
                                        </div>
                                    </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Long Description(Hindi) </h5>
                                    <div class="controls">
                                        <textarea id="editor2" name="long_des_hin" rows="10" cols="80">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
                                        <label for="checkbox_2">Hot Deals</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_3" name="featured" value="1">
                                        <label for="checkbox_3">Featured</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  
                                  <div class="controls">
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                          <label for="checkbox_4">Special Offers</label>
                                      </fieldset>
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
                                          <label for="checkbox_5">Special Deals</label>
                                      </fieldset>
                                  </div>
                              </div>
                          </div>
                      </div>
                      
                      <div class="text-xs-right">
                          <input type="submit" class="btn btn-primary" value="Add">
                      </div>
                  </form>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>

    <script type="text/javascript">

        $(document).ready(function() {
                $('select[name="category_id"]').on('change', function(){
                    var category_id = $(this).val();
                    if(category_id) {
                        $.ajax({
                            url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                            type:"GET",
                            dataType:"json",
                            success:function(data) {
                                $('select[name="subsubcategory_id"]').html('');
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


                $('select[name="subcategory_id"]').on('change', function(){
                    var subcategory_id = $(this).val();
                    if(subcategory_id) {
                        $.ajax({
                            url: "{{  url('/category/subsubcategory/ajax') }}/"+subcategory_id,
                            type:"GET",
                            dataType:"json",
                            success:function(data) {
                               var d =$('select[name="subsubcategory_id"]').empty();
                                  $.each(data, function(key, value){
                                      $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                                  });
                            },
                        });
                    } else {
                        alert('danger');
                    }
                });
            });
        
        </script>

        <script type="text/javascript">
            function mainthumbnail(input)
            {
                if(input.files && input.files[0])
                {
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#thumbnail').attr('src', e.target.result).width(80).height(80);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

        <script type="text/javascript">
            $(document).ready(function(){
   $('#multiimg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
        </script>

@endsection