<head>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav" style="flex-grow: 1; overflow-y: auto;">
            <div class="header-box pc-2 pt-3 pb-4">
                <h1 class="fs-4"><span class="text-white">foodTiger</span></h1>
            </div>

            <ul class="list-unstyled px-2">
                <li class="active"><a class="text-decoration-none px-3 py-2 d-block">Order Received</a></li>
                <li class=""><a class="text-decoration-none px-3 py-2 d-block">Listed Item</a></li>
                <li class=""><a class="text-decoration-none px-3 py-2 d-block">Shop Details</a></li>
                <li class=""><a class="text-decoration-none px-3 py-2 d-block">Home</a></li>
            </ul>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <div class="content">

        </div>
    </div>

    <script>
        $(".sidebar ul li").on('click', function() {
            $(".sidebar ul li.active").removeClass('active');
            $(this).addClass('active');
        });
    </script>
</body>

@section('styles')
<style>
    body {
        background: #eee;
    }

    #side_nav {
        background: #000;
        min-width: 250px;
        max-width: 250px;
        height: 100%;
        overflow-y: auto
    }

    .main-container {
        display: flex;
        height: 100vh;
    }

    .content {
        min-height: 100vh;
        width: 100%
    }

    hr.n-color {
        background: #eee;
    }

    .sidebar li.active {
        background: #eee;
        border-radius: 8px;
    }

    .sidebar li.active a,
    .sidebar li.active a:hover {
        color: #000
    }

    .sidebar li a {
        color: #fff
    }
</style>

@endsection
@yield('styles')