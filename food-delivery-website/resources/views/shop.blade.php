@extends('layouts.app')
@section('content')
<head>
</head>
<style>
  .first{
    width:100%;
    height:80%;
    background-image:url({{$shop['shop_image']}});
    background-attachment: fixed;
    background-size:cover;
  }
</style>

<div class="first">
</div>

<div class="container-fluid">
<div class="container">
<h1 class="pl-4">{{$shop['shop_name']}}</h1><br>
</div>
<div class="container first h-40" style="height: 200px;">
</div>
</div><br><br>

<link href="./style.css" rel="stylesheet" />

<div class="container ">
  @foreach ($products as $product)
    <form action="addToCart" method="post">
    @csrf
      <div class="row justify-content-start row-hover row-gap-3">
          <input type="hidden" name="id"  value="{{$product['id']}}">

          <input type="hidden" name="shop_id"  value="{{$shop['id']}}">
          <div class="col">
            <img class="rounded-5 w-100 p-3" src={{$product['product_image']}} alt="">
          </div>
          <div class="col d-flex justify-content-center align-items-center">
            {{$product['product_name']}}
          </div>
          <div class="col d-flex justify-content-center align-items-center">
            RM {{$product['product_price']}}
          </div>
            <div class="col d-flex justify-content-center align-items-center">
              <select class="form-select" aria-label="Default select example" name="quantity">
              <option quantity>Quantity</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              </select>
            </div>
            <div class="col d-flex justify-content-center align-items-center">
              <button class="btn btn-primary" type="submit">Add To Cart</button>
            </div>
        </div>
    </form>
  @endforeach
</div>
</div>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection