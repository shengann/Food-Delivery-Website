<x-header />
<div class="container-fluid" style="background-color:#F1F1F1">

<a class="btn btn-success" href="/shop/{{session('shop')}}}">Back to Shop</a>


@foreach (session('cart') as $id => $item)
    <div class="row justify-content-start border border-1">
    <div class="col border border-1 d-flex justify-content-center align-items-center">
        <img class="rounded-5 w-100 p-3" src={{$item['image']}} alt=""></td>
    </div>
    <div class="col border border-1 d-flex justify-content-center align-items-center">
        <td>{{$item['name']}}</td>
        </div>
        <div class="col border border-1 d-flex justify-content-center align-items-center">
        <td>{{$item['price']}}</td>
        </div>
        <div class="col border border-1 d-flex justify-content-center align-items-center">
        <td>{{$item['quantity']}}</td>
        </div>
        </div>
@endforeach