@extends('layouts.app')
@section('content')
<head>
  <link type="stylesheet" css="{{ asset('css/style.css') }}" />
</head>
<div class="container-fluid" style="background-color:#F1F1F1">
<h1>{{$shop['shop_name']}}</h1>
<div class="row align-items-center justify-content-center" style="">
  <div class="col-md-4 px-0" >
    <img class="img-fluid" src="{{$shop['shop_image']}}" alt="">
  </div>
</div>

<div class="container ">
  @foreach ($products as $product)
    <form action="addToCart" method="post">
        @csrf
        <div class="row justify-content-start border border-1">
          <input type="hidden" name="id"  value="{{$product['id']}}">

          <input type="hidden" name="shop_id"  value="{{$shop['id']}}">

          <div class="col border border-1">
            <img class="rounded-5 w-100 p-3" src="{{$product['product_image']}}" alt="">
          </div>

          <div class="col border border-1 d-flex justify-content-center align-items-center">
            {{$product['product_name']}}
          </div>

          <div class="col border border-1 d-flex justify-content-center align-items-center">
            {{$product['product_price']}}
          </div>

          <div class="col border border-1 d-flex justify-content-center align-items-center">
              <select class="form-select" aria-label="Default select example" name="quantity">
              <option quantity>Quantity</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              </select>
            </div>
            <div class="col d-flex justify-content-center align-items-center">
              <button class="btn btn-orange border border-1" type="submit">Add To Cart</button>
            </div>
        </div>
    </form>
  @endforeach
</div>
</div>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection