@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card ma-5" style="height:700px;">
        <div class="card-header">
            User Profile
        </div>
        <div class="card-body">
            <div class="row" style="height:500px;">
                <div class="col-md-4">
                    <img style="width:250px;height:250px;" src="../img/anonymous_profile/anonymous.jpg" alt="User Profile Picture">
                </div>
                <div class="col-md-8">
                    <ul class="list-group">
                        <li class="list-group-item">Name: {{$data['name']}}</li>
                        <li class="list-group-item">Email: {{$data['email']}}</li>
                    </ul>
                </div>
            </div>
            <div class="row" style="height:200px;">
                <a style="width:200px;height:40px" href="/home" class="btn btn-primary mx-auto">Back to Menu</a>
                <a style="width:200px;height:40px" href="{{ Auth::user()->id }}/edit" class="btn btn-success mx-auto">Edit User Profile</a>
                
            </div>
        </div>
    </div>
</div>
@endsection