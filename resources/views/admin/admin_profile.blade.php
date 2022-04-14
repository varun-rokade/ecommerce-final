@extends('admin.admin_master')

@section('title')
    Profile
@endsection

@section('admin')

<div class="container-full">
    <section class="content">
        <div class="row">
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black" style="background: url('../images/gallery/full/10.jpg') center center;">
                    <a href="{{ route('admin.profile.edit') }}" style="float: right;" class="btn btn-rounded btn-primary mb-5">Edit Profile</a>
                  <h3 class="widget-user-username">Admin Name: {{ $admin->name }}</h3>
                  <h6 class="widget-user-desc">Admin Email: {{ $admin->email }}</h6>
                </div>
                <div class="widget-user-image">
                  <img class="rounded-circle" src="{{ (!empty($admin->profile_photo_path)) ? url('upload/admin_images/'.$admin->profile_photo_path) : url('upload/no_image.jpg') }}" alt="User Avatar">
                </div>
                <div class="box-footer">
                    <div class="row">
                      
                      <!-- /.col -->
                      <div class="description-block">
                        <h5 class="description-header">Created At: {{$admin->created_at}}</h5>
                      </div>
                      
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
              </div>
        </div>
    </section>
</div>

@endsection