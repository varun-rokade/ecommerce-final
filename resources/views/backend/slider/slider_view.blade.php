@extends('admin.admin_master')

@section('admin')

<!-- Content Wrapper. Contains page content -->
{{-- <div class="content-wrapper"> --}}
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">
        <div class="row">
            

         

          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Slider List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Slider Image</th>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($slider as $item)
                              <tr>
                                <td><img src="{{ asset($item->image) }}" alt="" style="width: 70px; height: 40px"></td>
                                <td>
                                    @if ($item->title == NULL)
                                        <span class="badge badge-pill">No Title</span>
                                    @else
                                        {{ $item->title }}
                                    @endif
                                </td>
                                <td>
                                    @if ($item->des == NULL)
                                        <span class="badge badge-pill">No Description</span>
                                    @else
                                        {{ $item->des }}
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge badge-success-light badge-lg">Active</span>
                                    @else
                                        <span class="badge badge-danger-light badge-lg">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('slider.edit', $item->id) }}" class="fa fa-pencil btn btn-primary btn-sm" title="Edit data"></a>
                                    <a href="{{ route('slider.delete', $item->id) }}" id="delete" class="fa fa-trash btn btn-danger btn-sm" title="Delete data"></a>
                                    @if ($item->status == 1)
                                        <a href="{{ route('slider.inactive', $item->id) }}" class="fa fa-times btn btn-warning btn-sm" title="Inactive"></a>
                                    @else
                                        <a href="{{ route('slider.active', $item->id) }}" class="fa fa-check btn btn-success btn-sm" title="Active"></a>    
                                    @endif
                                </td>
                              </tr>
                          @endforeach
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>Slider Image</th>
                              <th>Title</th>
                              <th>Description</th>
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
          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Slider</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            
                                
                                    <div class="form-group">
                                        <h5>Title </h5>
                                        <div class="controls">
                                            <input type="text" name="title" id="title" class="form-control"
                                                data-validation-required-message="This field is required"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Description </h5>
                                        <div class="controls">
                                            <input type="text" name="des" id="des" class="form-control"
                                                data-validation-required-message="This field is required"
                                                value="">
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
                                        <input type="submit" class="btn btn-primary mb-5" value="Add">
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
