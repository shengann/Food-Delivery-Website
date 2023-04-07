@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card ma-5" style="height:1000px;">
        <div class="card-header">
            User Profile
        </div>
        <div class="card-body">
            <div class="row" style="height:800px;">
                <form action="/" method="post">
                    <div class="col-md-4">
                        <img style="width:250px;height:250px;" src="../../img/anonymous_profile/anonymous.jpg" alt="User Profile Picture">
                        <div class="mb-3">
                            <label for="profileImage" class="form-label">User Profile Picture: </label>
                            <input class="form-control" type="file" id="profileImage" name="profileImage">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="mb-3 row">
                                    <label for="username" class="col-sm-2 col-form-label">Name:</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" id="username" value="{{$data['name']}}">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">Email:</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email" id="email" value="{{$data['email']}}">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                            <div class="mb-3 row">
                                <label for="password" class="col-sm-2 col-form-label">Password:</label>
                                <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" id="password">
                                </div>
                            </div>
                            </li>
                            <li class="list-group-item">
                            <div class="mb-3 row">
                                <label for="confirmpassword" class="col-sm-2 col-form-label">Confirm Password:</label>
                                <div class="col-sm-10">
                                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword">
                                </div>
                            </div>
                            </li>
                        </ul>
                    </div>
                    </div>
                    <div class="row" style="height:200px;">
                        <a style="width:200px;height:40px" href="/profile/{{ Auth::user()->id }}" class="btn btn-primary mx-auto">Return</a>
                        <input type="submit" style="width:200px;height:40px" href="profile/edit/{{ Auth::user()->id }}" class="btn btn-success mx-auto" value="Edit Complete">
                        
                    </div>
                </form>
                
               
                
            
        </div>
    </div>
</div>


@endsection