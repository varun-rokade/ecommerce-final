@extends('frontend.master_home')

@section('title')
    Dashboard
@endsection

@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')
            <div class="col-md-2">
                
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text">Hi </span><strong>{{ Auth::user()->name }}</strong> Welcome</h3>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection