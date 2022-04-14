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
                    <h3 class="text-center"><span class="text-danger"></span><strong>Update Profile</strong></h3>
                    <div class="card-body">
                        <form action="{{ route('user.profile.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" id="name" class="form-control unicase-form-control text-input" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control unicase-form-control text-input" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control unicase-form-control text-input" value="{{ $user->phone }}">
                                @error('phone')
                                    <span class="alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Profile Photo</label>
                                <input type="file" name="profile_photo_path" id="profile_photo_path" class="form-control unicase-form-control text-input" >
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