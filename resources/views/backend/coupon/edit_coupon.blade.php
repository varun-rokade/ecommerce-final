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
                 <h3 class="box-title">Update Coupon</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                <form action="{{ route('coupon.update') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            
                                    <input type="hidden" name="id" value="{{ $coupons->id }}">
                                    <div class="form-group">
                                        <h5>Coupon <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control"
                                                data-validation-required-message="This field is required"
                                                value="{{ $coupons->name }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Coupon Discount (%) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="discount" class="form-control"
                                                data-validation-required-message="This field is required"
                                                value="{{ $coupons->discount }}">
                                                @error('discount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Coupon Validity <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="validity" class="form-control"
                                                data-validation-required-message="This field is required"
                                                value="{{ $coupons->validity }}" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                                @error('category_image')
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