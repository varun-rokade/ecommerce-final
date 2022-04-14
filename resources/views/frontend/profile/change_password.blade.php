@extends('frontend.master_home')

@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar');
            <div class="col-md-2">
                
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger"></span><strong>Change Password</strong></h3>
                    <div class="card-body">
                        <form action="{{ route('user.password.update') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Current Password</label>
                                <input type="password" name="current_password" id="current_password" class="form-control unicase-form-control text-input">
                                @error('current_password')
                                    <span class="alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">New Password</label>
                                <input type="password" name="password" id="password" class="form-control unicase-form-control text-input">
                                @error('password')
                                    <span class="alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control unicase-form-control text-input">
                                @error('password_confirmation')
                                    <span class="alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn  btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection