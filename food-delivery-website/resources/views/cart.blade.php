@extends('layouts.app')
@section('content')
<div class="container-fluid" style="background-color:#F1F1F1">

@if(!session('shop'))
<a class="btn btn-success position-relative" href="/home">Back to Home</a><br><br>
@else
<a class="btn btn-success position-relative" href="/shop/{{session('shop')}}}">Back to Shop</a><br><br>
@endif

<input type="hidden" id="session-data"x value="<?= htmlspecialchars(json_encode(session('cart'))) ?>">


<div id='popup'></div>
<div id='mycomp'></div>

@if (!session('cart'))
<img class="position-absolute top-50 start-50 translate-middle w-25 p-3"  src="{{ asset('img/icons/emptycart.png') }}" alt="">
<p class="position-absolute bottom-20 start-50 translate-middle-x --bs-tertiary-color fs-3">Oops! There's nothing in your cart yet</p>
@endif

@endsection
<script src="/js/app.js"></script>
