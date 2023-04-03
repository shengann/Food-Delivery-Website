<x-header />
<div class="container-fluid" style="background-color:#F1F1F1">

<table>
@foreach ($details as $item)
    <tr>
        <td>{{$item['product_name']}}</td>
        <td>{{$item['product_price']}}</td>
    </tr>
@endforeach
</table>