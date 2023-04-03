<x-header />
<div class="container-fluid" style="background-color:#F1F1F1">

<a href="/shop/{{session('shop')}}}">Back to Shop</a>
<table>
@foreach (session('cart') as $id => $item)
    <tr>
        <td>{{$item['name']}}</td>
        <td>{{$item['price']}}</td>
        <td>{{$item['quantity']}}</td>
    </tr>
@endforeach
</table>