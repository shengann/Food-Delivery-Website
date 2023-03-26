<h1>{{$products[0]['id']}}</h1>

<table>
@foreach ($products as $product)
    <tr>{{$product['product_name']}}</tr><br>
    <tr>{{$product['product_price']}}</tr><br>
@endforeach
</table>