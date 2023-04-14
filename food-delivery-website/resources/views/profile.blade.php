@extends('layouts.app')
<head>
<style>
.gradient-custom {
    /* fallback for old browsers */
    background: #f6d365;

    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
}

.bottom-division {
  position: absolute;
  bottom: 0; /* stick the division to the bottom */
  width: 100%; /* set the width to 100% */
  
}
.container-bottom {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  
  
}

.info_title{
    font-size: 40px;
    width:20%;
    height:10vh
}

.info_details{
    font-size: 40px;
    margin-left:20px;
    width:100%;
    height:100vh
    length: 30;
}

</style>
</head>
@section('content')



<div class="container">


      <div class="col col-lg-100 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              
              
              @if($data->image_path)
              
              <img src="{{ asset('storage/img/userprofile_photo/' . Auth::user()->image_path) }}"
                alt="Avatar" class="img-fluid my-5" style="width: 300px; height: 300px;border-radius: 50%;" />
                
              @else
              <img src="{{ asset('img/anonymous_profile/anonymous.jpg') }}"
                alt="Avatar" class="img-fluid my-5" style="width: 300px; height: 300px;border-radius: 50%;" />
              @endif
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body p-6">
                <h6 style=" font-size: 60px ">User Profile</h6>
                <hr class="mt-0 mb-4">
                <div class=" pt-1">
                  <div class="col-60 mb-3">
                    <span style="display: flex;">
                    <label class = "info_title">Name:</label>
                    
                    <input type="text" class="text-muted info_details" size="10" placeholder="{{$data['name']}}" readOnly/>
                    </span>
                  </div>
                  
                  <div class="col-60 mb-3">
                    <span style="display: flex;">
                    <label class = "info_title">Email:</label>
                    <input type="text" class="text-muted info_details"  size="10" placeholder="{{$data['email']}}" readOnly/>
                    </span>
                  </div>

                  <div class="col-60 mb-3">
                    <span style="display: flex;">
                    <label class = "info_title">Address:</label>
                    
                    <textarea id="address" class="text-muted info_details" name="address" rows="6" cols="40" value="{{$data['address']}}"placeholder="{{$data['address']}}" readOnly></textarea>

                    </span>
                  </div>
                  
                    
                </div>
                
                <div class="row" style="height:10px;align-items: flex-end; padding-bottom: 50px;padding-top: 30px">
                
                    <div class="container-bottom" >
                        <a style="width:200px;height:40px;align-items: center; " href="/home" class="btn btn-primary mx-auto">Back to Menu</a>
                        <a style="width:200px;height:40px;align-items: center;" href="{{ Auth::user()->id }}/edit" class="btn btn-success mx-auto">Edit User Profile</a>
                    </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
</section>
    <!-- <div class="card ma-5" style="height:700px;">

        <div class="card-header">
            User Profile
        </div>
        
        <div class="card-body">
            <div class="row" style="height:500px;">
                <div class="col-md-4">
                    @if(Auth::user()->image_path == null)
                    <img style="width:250px;height:250px;" src="{{ asset('img/anonymous_profile/anonymous.jpg' . Auth::user()->image_path) }}" alt="User Profile Picture">
                    @else
                    <img style="width:250px;height:250px;" src="{{ asset('storage/img/userprofile_photo/' . Auth::user()->image_path) }}" alt="User Profile Picture">
                    @endif
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
</div> -->



@endsection