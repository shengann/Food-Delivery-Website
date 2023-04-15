<head>
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="row">
        
        <div id='history' data-user-id='{{ Auth::user()->id }}'></div>

    </div>

    </body>
    <script src="/js/components/History.js"></script>

    @endsection