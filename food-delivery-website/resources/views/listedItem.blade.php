<head>
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

</head>
<<body>
    @extends('layouts.app')
    @section('content')
    <div class="row">
        <div class="col-6">
            <div class="card mx-4" style="height: 200px;">
                <a href="/admin" class="card-body" style="text-decoration: none; font-weight: none;">
                    <i class="bi bi-telephone-inbound d-block mb-4" style="font-size: 4rem;"></i>
                    <h3 class="card-title" style="font-size: 2.5rem;">Order Received</h3>
                </a>
            </div>
        </div>
        <div class="col-6">
            <div class="card mx-4" style="height: 200px;">
                <a class="card-body" style="text-decoration: none; font-weight: none;">
                    <i class="bi bi-list d-block mb-4" style="font-size: 4rem;"></i>
                    <h3 class="card-title" style="font-size: 2.5rem;">Listed Item</h3>
                </a>
            </div>
        </div>
    </div>

    <div id='listedItem' data-shop-id='{{ Auth::user()->shop_id }} '></div>

    </div>

    </body>
    <script src="/js/components/ListedItem.js"></script>

    @endsection