<x-header />
<div class="container-fluid" style="background-color:#F1F1F1">

<table>
@foreach (session('cart') as $id => $item)
    <tr>
        <td>{{$item['name']}}</td>
        <td>{{$item['price']}}</td>
    </tr>
@endforeach
</table>