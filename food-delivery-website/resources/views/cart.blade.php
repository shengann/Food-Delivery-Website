@extends('layouts.app')
@section('content')

@if(!session('shop'))
<a class="btn btn-success position-relative" href="/home">Back to Home</a><br><br>
@else
<a class="btn btn-success position-relative" href="/shop/{{session('shop')}}}">Back to Shop</a><br><br>
@endif

<div class="container-fluid" style="background-color:#F1F1F1">


<div id='popup'></div>
<div id='mycomp'></div>

@if (!session('cart'))
<img class="position-absolute top-50 start-50 translate-middle w-25 p-3"  src="{{ asset('img/icons/emptycart.png') }}" alt="">
<p class="position-absolute bottom-20 start-50 translate-middle-x --bs-tertiary-color fs-3">Oops! There's nothing in your cart yet</p>
@endif

@if(session('cart'))
<!--<div id='confirm'></div>-->
<div style="width:100%">
<a style="margin-left:70%;" class="btn btn-success position-relative" href="/confirmOrder">Confirm Order</a><br><br>
</div>
@endif

@endsection
<script src="/js/app.js"></script>
