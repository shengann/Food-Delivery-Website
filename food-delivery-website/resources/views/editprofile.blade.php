@extends('layouts.app')
<style>
.gradient-custom {
    /* fallback for old browsers */
    background: #f6d365;

    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
}    
</style>

@section('content')
<div class="container" >
        
    <div class="card ma-5" style="height:130vh;">
    
        <div class="card-header">
            <h6 style=" font-size: 30px; text-align:center">Edit User Profile</h6>
        </div>

        <div class="col-md-12 gradient-custom text-center text-white"
            style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem; height: 30vh">
             @if($data->image_path)
              
              <img src="{{ asset('storage/img/userprofile_photo/' . Auth::user()->image_path) }}"
                alt="Avatar" class="img-fluid my-5" style="width: 300px; height: 300px;border-radius: 50%;" />
                
              @else
              <img src="{{ asset('img/anonymous_profile/anonymous.jpg') }}"
                alt="Avatar" class="img-fluid my-5" style="width: 300px; height: 300px;border-radius: 50%;" />
              @endif
            
             
            <div class="card-body row d-flex justify-content-center align-items-center" style="height:10vh;">

            <div  style="height:100vh; padding-top:0vh">
                <form class = "row d-flex justify-content-center align-items-center "action="{{route('users.update', ['id' => $data->id])}}" method="POST" enctype="multipart/form-data" >
                    @csrf   
                    <div class="col-md-8" style="padding-bottom:2vh">
                        

                       
                        <div class="mb-3 " >
                            <label for="image" class="form-label" style="color:black;">Upload Profile Picture: 
                            </label>
                            <input type="file" name="image" id="image" accept="image/*" class="form-control @error('image') is-invalid @enderror}}">
                                @error('image')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                        
                        </div>

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
                                        <label for="address" class="col-sm-2 col-form-label">Address:</label>
                                        <div class="col-sm-10">
                                        <textarea id="address" class="form-control @error('address')is-invalid @enderror" name="address" rows="5" cols="40" value="{{$data['address']}} " placeholder="{{$data['address']}}">{{$data['address']}}</textarea>
                                        
                                        <!-- <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$data['address']}}"> -->
                                        @error('address')
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
                    <div class="row" style="height:10vh; padding-top: 5vh;padding-buttom: 0vh;">
                        <a style="width:50%;height:5vh" href="/profile/{{ Auth::user()->id }}" class="btn btn-primary mx-auto">Return</a>
                        <button type="submit" style="width:50%;height:5vh" class="btn btn-success mx-auto">Update User</button>
                        
                    </div>
                </form>
                
                
            
        </div>
        
        </div>

       
    </div>
                                
</div>


@endsection