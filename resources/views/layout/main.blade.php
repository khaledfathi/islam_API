<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Islam API | Home')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/layout/style.css') }}">
    @yield('links')
</head>

<body>
    <div class="header">
        <h1>Islam Mohamed Project API </h1>
        <hr>
    </div>
    <div class="button-div">
        <a href="{{ route('user.index') }}"> Users </a>
        <a href="{{ route('product.index') }}"> Products </a>
        <a href="{{ route('service.index') }}"> service </a>
        <a href="{{ route('api') }}"> API </a>
    </div>
    @yield('content')
    @yield('scripts')
</body>

</html>