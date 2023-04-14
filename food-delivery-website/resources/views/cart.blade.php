@extends('layouts.app')
@section('content')
<div class="container-fluid" style="background-color:#F1F1F1">
<br><br>

    @if(!session('shop'))
    <a class="btn btn-primary position-relative" href="/home">Back to Home</a><br><br>
    @else
    <a class="btn btn-primary position-relative" href="/shop/{{session('shop')}}}">Back to Shop</a><br><br>
    @endif

    <input type="hidden" id="session-data"x value="<?= htmlspecialchars(json_encode(session('cart'))) ?>">


    <div id='popup'></div>
    <div id='mycomp'></div>

    @if (!session('cart'))
    <div class="container">
    <div class="row justify-content-center ">
        <div class="col-5  ">
        <p class="--bs-tertiary-color fs-3">Oops! There's nothing in your cart yet</p><br>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
        <img class="img-fluid" src="{{ asset('img/icons/emptycart.png') }}" alt="">
        <br><br><br><br><br>
        </div>
    </div>
    </div>
    @endif

</div>
@endsection
<script src="/js/app.js"></script>
