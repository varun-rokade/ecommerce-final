@extends('admin.admin_master')

@section('title')
    Change Password
@endsection

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="content-header">
        <div class="d-flex align-items-center">
            {{-- <div class="mr-auto"> --}}
            <h3>Change Password</h3>
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
                        <form action="{{ route('update.password') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Current Password <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="password" name="current_password" id="current_password" class="form-control" required=""
                                                        data-validation-required-message="This field is required"
                                                        value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>New Password <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="password" name="password" id="password" class="form-control" required=""
                                                        data-validation-required-message="This field is required"
                                                        value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Confirm Password <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required=""
                                                        data-validation-required-message="This field is required"
                                                        value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-primary mb-5" value="Change">
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

@endsection
