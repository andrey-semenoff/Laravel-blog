<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/libs/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/blog.css{{ (true) ? '?'.filemtime('css/blog.css') : '' }}">
    <script src="/libs/jquery/jquery-3.2.1.min.js"></script>
    <script src="/libs/popper/popper.min.js"></script>
    <script src="/libs/bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script src="/js/main.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>
</head>
<body>
    @include('layouts.header')
    <main role="main" class="container">
        <div class="row">
            @yield('content')
            @yield('aside')
        </div>
    </main>
    @include('layouts.footer')
    @include('layouts.hidden')
</body>
</html>