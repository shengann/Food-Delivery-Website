<x-header />
<div class="container-fluid" style="background-color:#F1F1F1">
<h1>{{$shop['shop_name']}}</h1>
<img src="../img/kfccover.jpeg" alt="">


<div class="container">
@foreach ($products as $product)
<form action="addToCart" method="post">
@csrf
<div class="container text-center row-gap-3" style="border:1">

<div class="row align-items-start row-gap-3" style="border:1" >
    <input type="hidden" name="id"  value="{{$product['id']}}">
    <div class="col">
    {{$product['product_name']}}
    </div>
    <div class="col">
    {{$product['product_price']}}
    </div>
    <div class="col">
    <select class="form-select" aria-label="Default select example" name="quantity">
      <option quantity>Quantity</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
    </select>
    </div>
    <div class="col">
    <button class="btn btn-primary" type="submit">Add To Cart</button>
  </div>
</form>
@endforeach
</div>
</div>
</div>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">