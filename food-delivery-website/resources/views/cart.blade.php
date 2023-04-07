<x-header />
<div class="container-fluid" style="background-color:#F1F1F1">

<a class="btn btn-success" href="/shop/{{session('shop')}}}">Back to Shop</a>

<input type="hidden" id="session-data" value="<?= htmlspecialchars(json_encode(session('cart'))) ?>">

<div id='popup'></div>
<div id='mycomp'></div>

<script src="/js/app.js"></script>