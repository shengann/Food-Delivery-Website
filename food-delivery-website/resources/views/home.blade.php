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

        <!--search bar-->
        <div class="row">
        <form class="form-inline" action="{{route('search')}}">
            <div class="form-group row my-5">
                <input style="margin-left:300px;width:500px;" type="text" class="form-control" name="searchName" placeholder="Search using store name...">
                <button type="submit" class="btn col-md-1 mx-3 btn-primary">Search</button>
            </div>
        </form>
        </div>

        <!-- this div here is to display all the shops-->
        <div class="row mt-4">
            @foreach($shops as $shop)
            <div class="col-md-3 mx-auto">
                <div class="card" style="height:400px;">
                    <div style="height:200px;padding:2px">
                        <img class="card-img-top" src="{{$shop['shop_image'] }}" alt="image">
                    </div>
                    <div class="card-body">
                        <div style="height:100px">
                            <h5>{{ $shop['shop_name']}}</h5>
                        </div>
                        <a href="shop/{{$shop['id']}}" class="btn btn-primary">Visit Shop</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
