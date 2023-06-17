@extends('layout.main')
@section('title', 'Login Tester')
@section('active-login-tester', 'active-button')
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/loginTester/style.css') }}">
@endsection

@section('scripts', '')

@section('content')
    <div>
        <div>
            <h3>Login Tester</h3>
        </div>
        <div>
            <form action="{{route('loginTester.login')}}">
                @csrf
                <div>
                    <label for="">Email</label>
                    <input type="email" name="email">
                </div>
                <div>
                    <label for="">Password</label>
                    <input type="password" name="password">
                </div>
                <div>
                    <input type="submit" value="Login Test">
                </div>
            </form>
        </div>
        <div class="result">            
            @if ($errors->any())
                <h3 class="error">Result : {{$errors->first()}}</h3>
            @elseif(session('ok'))
                <h3 class="ok">Result : {{session('ok')}}</h3>
            @else
                <h3 >Result : --- </h3>
            @endif
        </div>
    </div>
@endsection
