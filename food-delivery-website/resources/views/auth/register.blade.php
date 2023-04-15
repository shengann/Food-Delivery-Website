@extends('layouts.app')

@section('content')
<section class="vh-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-black">


                <div class="d-flex align-items-center h-custom-3 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                    <form method="POST" action="{{ route('register') }}" style="width: 23rem;">
                        @csrf

                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">{{ __('Register') }}</h3>

                        <div class="form-outline mb-4">
                           
                            <label class="form-label" for="name">{{ __('Name') }}</label>

                            <div class="col-md-100">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>


                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-outline mb-4">
                           
                           <label class="form-label" for="email">{{ __('Email Address') }}</label>

                           <div class="col-md-100">
                               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                               @error('email')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                               @enderror
                           </div>
                       </div>

                        <div class="form-outline mb-4">
                          
                            <label class="form-label" for="password">{{ __('Password') }}</label>

                            <div class="col-md-100">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-outline mb-4">
                          
                            <label class="form-label" for="password-confirm">{{ __('Confirm Password') }}</label>

                            <div class="col-md-100">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                            </div>
                        </div>

                        <div class="pt-1 mb-4">
                            <button class="btn btn-info btn-lg btn-block" type="submit">{{ __('Register') }}</button>
                        </div>
                        
                    </form>

                </div>

            </div>

            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="img\product_img\napolitan.jpeg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: center;">
            </div>
        </div>
    </div>
</section>
@endsection

<style>
.bg-image-vertical {
position: relative;
overflow: hidden;
background-repeat: no-repeat;
background-position: right center;
background-size: auto 100%;
}

@media (min-width: 1025px) {
.h-custom-2 {
height: 50%;
}
}

</style>
