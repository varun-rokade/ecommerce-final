@extends('admin.admin_master')

@section('title')
    Edit Profile
@endsection

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="content-header">
        <div class="d-flex align-items-center">
            {{-- <div class="mr-auto"> --}}
            <h3>Edit Profile</h3>
            {{-- </div> --}}
        </div>
    </div>

    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Enter your details</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Admin Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control" required=""
                                                        data-validation-required-message="This field is required"
                                                        value="{{ $admin->name }}">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" required=""
                                                    data-validation-required-message="This field is required"
                                                    value="{{ $admin->email }}">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <h5>Profile Photo <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" id="image" name="profile_photo_path"
                                                        class="form-control">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <img id="showimage"
                                                src="{{ !empty($admin->profile_photo_path)? url('upload/admin_images/' . $admin->profile_photo_path): url('upload/no_image.jpg') }}"
                                                alt="User Avatar" width="100px" height="100px">
                                        </div>

                                        <div class="col-md-6">
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-primary mb-5" value="Update">
                                            </div>
                                        </div>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showimage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
