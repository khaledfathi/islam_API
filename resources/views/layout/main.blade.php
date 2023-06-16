<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title' , 'Islam API | Home')</title>
    @yield('links')
</head>
<body>    
    <div class="header">
        <h1>Islam Mohamed Project API </h1>
    </div> 
    @yield('content'); 
    @yield('scripts')
</body>
</html>