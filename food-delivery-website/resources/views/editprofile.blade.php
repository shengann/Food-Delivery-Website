@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card ma-5" style="height:1000px;">
        <div class="card-header">
            User Profile
        </div>
        <div class="card-body">

            <div class="row" style="height:800px;">
                <form action="{{route('users.update', ['id' => $data->id])}}" method="POST" enctype="multipart/form-data" >
                    @csrf   
                    <div class="col-md-4">
                        
                        <!-- <img style="width:250px;height:250px;" src="../../img/anonymous_profile/anonymous.jpg" alt="User Profile Picture"> -->
                        <h1>{{ asset('storage/public/img/userprofile_photo/' . $data->image_path) }}</h1>
                        
                        @if ($data->image_path)
                            <img style="width:250px;height:250px;" src="../../img/userprofile_photo/64306d085b188.jpg" alt="Profile Picture">
                        @else
                            <img style="width:250px;height:250px;" src="../../img/anonymous_profile/anonymous.jpg" alt="Default Profile Picture">
                        @endif
                        <div class="mb-3">
                            <label for="image" class="form-label">User Profile Picture: </label>
                            <input type="file" name="image" id="image" accept="image/*" class="form-control @error('image') is-invalid @enderror}}">
                                @error('image')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <!-- @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                            </ul>
                        </div>
                        @endif -->
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="mb-3 row">
                                    <input type="hidden" name="id" value="{{$data['id']}}"> 
                                    <label for="name" class="col-sm-2 col-form-label">Name:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$data['name']}}">                                    
                                        @error('name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">Email:</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$data['email']}}">
                                    @error('email')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror    
                                </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                            <div class="mb-3 row">
                                <label for="password" class="col-sm-2 col-form-label">Password:</label>
                                <div class="col-sm-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">                                </div>
                                @error('password')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                            </div>
                            </li>
                            <li class="list-group-item">
                            <div class="mb-3 row">
                                <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password:</label>
                                <div class="col-sm-10">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                @error('password_confirmation')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror    
                            </div>
                            </div>
                            </li>
                        </ul>
                    </div>
                    </div>
                    <div class="row" style="height:200px;">
                        <a style="width:200px;height:40px" href="/profile/{{ Auth::user()->id }}" class="btn btn-primary mx-auto">Return</a>
                        <button type="submit" style="width:200px;height:40px" class="btn btn-success mx-auto">Update User</button>
                        
                    </div>
                </form>
                
               
                
            
        </div>
    </div>
</div>


@endsection