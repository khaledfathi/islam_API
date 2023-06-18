<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('assets/css/login/login.css')}}">
</head>
<body>
    <div class="container">
        <div>
            @if ($errors->any())
                <h3>{{$errors->first()}}</h3>
            @endif
        </div>
        <form action="{{route('auth.login')}}">
            <div>
                <label for="">Email</label>
                <input type="email" name="email" >
            </div>
            <div>
                <label for="">Password</label>
                <input type="password" name="password" >
            </div>
            <div>
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
</body>
</html>