@extends('layout.main')
@section('title', 'Blog | View Article')
@section('active-blog' , 'active-button')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/blog/style.css')}}">
@endsection
@section('scripts', '')


@section('content')
    <div>
        <div>
            <h3>View Post</h3>
        </div>
        {{-- view post  --}}
        <div>
            <hr>
            <div>
                <h1>Title : {{$record->title}}  </h1>
                <h2>Author : ID:{{$record->user_id}} | {{$record->user_name}} | {{$record->user_type}}</h2>
                <h2>Time : {{substr($record->time , 0 , -3)}}</h2>
            </div>
            <hr>
            <div>
                <br>
                <h2>Abstract : </h2>
                {!!$record->abstract!!}
            </div>
            <hr>
            <div>
                <br>
                <h2>Article :</h2>
                    {!!$record->article!!}
            </div>
        </div>
        {{-- / view post  --}}
    </div>
@endsection
