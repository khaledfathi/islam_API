@extends('layout.main')
@section('title', 'Users | Create')
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/user/create.css') }}">
@endsection
@section('scripts', '')


@section('content')
    <div>
        <div>
            <h3>Create New User</h3>
        </div>
        <div class="errors">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p style="color:red;">Error : {{$error}}</p>
                @endforeach
            @endif
        </div>
        <div>
            <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="">Name<span style="color:red">*</span></label>
                    <input type="text" name="name" id="" required>
                </div>
                <div>
                    <label for="">Email<span style="color:red">*</span></label>
                    <input type="email" name="email" id="" required>
                </div>
                <div>
                    <label for="">Phone</label>
                    <input type="text" name="phone" id="">
                </div>
                <div>
                    <label for="">Password<span style="color:red">*</span></label>
                    <input type="password" name="password" id="" required>
                </div>
                <div>
                    <label for="">Type<span style="color:red">*</span></label>
                    <select name="type" id="" required>
                        @foreach ($userTypes as $type)
                            <option value="{{$type->value}}">{{$type->value}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Image</label>
                    <input type="file" name="image" id="">
                </div>
                <div>
                    <input type="submit" value="Save">
                </div>

            </form>
            <hr>
        </div>
        <div>
            <span style="color:red">*</span> Reuired
        </div>
    </div>
@endsection
