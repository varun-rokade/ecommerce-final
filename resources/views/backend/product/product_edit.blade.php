@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3>Edit Product</h3>
              </div>
          </div>
      </div>	  

      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Enter product details</h4>
            
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="POST" action="{{ route('product.update') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
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
                                                <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>{{ $brand->brand_name_en }}</option>    
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
                                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>    
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
                                        <input type="text" name="product_name_en" class="form-control" required value="{{ $product->product_name_en }}"> </div>
                                        @error('product_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Name(Hindi) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_hin" class="form-control" required value="{{ $product->product_name_hin }}"> </div>
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
                                        <input type="text" name="product_code" class="form-control" required value="{{ $product->product_code }}"> </div>
                                        @error('product_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_qty" class="form-control" required value="{{ $product->product_qty }}"> </div>
                                        @error('product_qty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Tags(English) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_en" required data-role="tagsinput" placeholder="Product Tags(English)" value="{{ $product->product_tags_en }}"/> </div>
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
                                            <input type="text" name="product_tags_hin" required placeholder="Product Tags(Hindi)" data-role="tagsinput" value="{{ $product->product_tags_hin }}"/> </div>
                                            @error('product_tags_hin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                            </div>

                            <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Size(English) </h5>
                                        <div class="controls">
                                            <input type="text" name="product_size_en" value="{{ $product->product_size_en }}" data-role="tagsinput"/> </div>
                                            @error('product_size_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                            </div>

                            <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Size(Hindi) </h5>
                                        <div class="controls">
                                            <input type="text" name="product_size_hin" placeholder="Product Size(Hindi)" value="{{ $product->product_size_hin }}" data-role="tagsinput"/> </div>
                                            @error('product_size_hin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                            </div>

                        </div>
                          
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Color(English) </h5>
                                        <div class="controls">
                                            <input type="text" name="product_color_en" value="{{ $product->product_color_en }}" data-role="tagsinput"/> </div>
                                            @error('product_color_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                            </div>

                            <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Color(Hindi) </h5>
                                        <div class="controls">
                                            <input type="text" name="product_color_hin" value="{{ $product->product_color_hin }}" placeholder="Product Color(Hindi)" data-role="tagsinput"/> </div>
                                            @error('product_color_hin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                            </div>

                            

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Selling Prize <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="selling_price" required class="form-control" value="{{ $product->selling_price }}"> </div>
                                        @error('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Discount Price </h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="discount_price" value="{{ $product->discount_price }}"/> </div>
                                            @error('discount_price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                            </div>

                            <div class="col-md-4">
                                 
                            </div>

                            <div class="col-md-4">
                                
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Short Description(English) </h5>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="short_des_en"/ value="{{ $product->short_des_en }}"> </div>
                                            @error('short_des_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Short Description(Hindi) </h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="short_des_hin" value="{{ $product->short_des_hin }}"/> </div>
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
                                            <textarea id="editor1" name="long_des_en" rows="10" cols="80">{{ $product->long_des_en }}
						                    </textarea>
                                        </div>
                                    </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Long Description(Hindi) </h5>
                                    <div class="controls">
                                        <textarea id="editor2" name="long_des_hin" rows="10" cols="80">{{ $product->long_des_hin }}
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
                                        <input type="checkbox" id="checkbox_2" name="hot_deals" value="1" {{ $product->hot_deals == 1 ? 'checked' : '' }}>
                                        <label for="checkbox_2">Hot Deals</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_3" name="featured" value="1" {{ $product->featured == 1 ? 'checked' : '' }}>
                                        <label for="checkbox_3">Featured</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  
                                  <div class="controls">
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{ $product->special_offer == 1 ? 'checked' : '' }}>
                                          <label for="checkbox_4">Special Offers</label>
                                      </fieldset>
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_5" name="special_deals" value="1" {{ $product->special_deals == 1 ? 'checked' : '' }}>
                                          <label for="checkbox_5">Special Deals</label>
                                      </fieldset>
                                  </div>
                              </div>
                          </div>
                      </div>
                      
                      <div class="text-xs-right">
                          <input type="submit" class="btn btn-primary" value="Update">
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

      {{-- thumbnail update --}}

      <section class="content">
        <div class="row">
          <div class="col-md-12">
              <div class="box box-outline-info">
                <div class="box-header">
                  <h4 class="box-title"><strong>Product Thumbnail Update</strong></h4>
                </div><br>
                <div class="box-body">
                <form action="{{ route('update.product.thumbnail') }}" enctype="multipart/form-data" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{ $product->id }}">
                  <input type="hidden" name="old_image" value="{{ $product->product_thumbnail }}">
                  <div class="row">
                          <div class="col-md-4">
                              <div class="box br-3 bl-3 bt-3 bb-3 border-warning text-center">
                                  <div class="box-header">
                                      
                                      <h4 class="box-title"><strong>Thumbnail</strong></h4>
                                    </div>
                                  
                                  <div class="box-body">
                                      <img src="{{ asset($product->product_thumbnail) }}" id="thumbnail" style="height: 170px; width: 100px;">
                                    <br><br><a href="" class="btn btn-danger" id="delete" title="Delete data"><i class="fa fa-trash"></i></a>
                                    <p class="card-text">
                                        <div class="form-group">
                                            <label for="" class="form-control-label">Change Image</label>
                                            <input type="file" class="form-control" name="product_thumbnail" onchange="mainthumbnail(this)">
                                            {{-- <img src="" id="thumbnail" > --}}
                                        </div>
                                    </p>
                                  </div>
                                </div>
                          </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                      <input type="submit" class="btn btn-primary" value="Update Thumbnail">
                  </div>
                  </div><br>
                </form>
              </div>
              </div>
            </div>
        </div>
    </section>

      {{-- end thumbnail update --}}

      {{-- multi image update --}}

      <section class="content">
          <div class="row">
            <div class="col-md-12">
				<div class="box box-outline-info">
				  <div class="box-header">
					<h4 class="box-title"><strong>Product Image Update</strong></h4>
                  </div><br>
                  <div class="box-body">
                  <form action="{{ route('update.product.image') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        @foreach ($multiimg as $img)
                            <div class="col-md-4">
                                <div class="box br-3 bl-3 bt-3 bb-3 border-warning text-center">
                                    <div class="box-header">
                                        
                                        <h4 class="box-title"><strong>Image</strong></h4>
                                      </div>
                                    
                                    <div class="box-body">
                                        <img src="{{ asset($img->photo) }}" style="height: 170px; width: 100px;">
                                      <br><br>
                                      <a href="{{ route('delete.product.image', $img->id) }}" class="btn btn-danger" id="delete" title="Delete data"><i class="fa fa-trash"></i></a>
                                      <p class="card-text">
                                          <div class="form-group">
                                              <label for="" class="form-control-label">Change Image</label>
                                              <input type="file" class="form-control" name="multi_img[{{ $img->id }}]" id="">
                                          </div>
                                      </p>
                                    </div>
                                  </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                        <input type="submit" class="btn btn-primary" value="Update Image">
                    </div>
                    </div><br>
                  </form>
                </div>
				</div>
			  </div>
          </div>
      </section>

      {{-- end multi image update --}}

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

@endsection