@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>

        <!-- this div here is to display all the shops-->
        <div class="row mt-4">
            @foreach($shops as $shop)
            <div class="col-md-3 mx-auto">
                <div class="card" style="height:300px;">
                    <img style="" class="card-img-top" src="{{$shop['shop_image'] }}" alt="image">
                    <div class="card-body">
                        <h5>{{ $shop['shop_name']}}</h5>
                        <a href="shop/{{$shop['id']}}" class="btn btn-primary">Visit Shop</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
