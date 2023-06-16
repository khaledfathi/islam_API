@extends('layout.main')
@section('title', 'Users | Edit')
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/user/edit.css') }}">
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
            @elseif(session('ok'))
                <p style="color:green">{{session('ok')}}</p>
            @endif
        </div>
        <div>
            <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value= "{{$record->id}}">
                <div>
                    <label for="">Name<span style="color:red">*</span></label>
                    <input type="text" name="name" id="" required value="{{$record->name}}">
                </div>
                <div>
                    <label for="">Email<span style="color:red">*</span></label>
                    <input type="email" name="email" id="" required value="{{$record->email}}">
                </div>
                <div>
                    <label for="">Phone</label>
                    <input type="text" name="phone" id="" value="{{$record->phone}}">
                </div>
                <div>
                    <label for="">Password<span style="color:red">*</span></label>
                    <input type="password" name="password" id="" required >
                </div>
                <div>
                    <label for="">Type<span style="color:red">*</span></label>
                    <select name="type" id="" required>
                        @foreach ($userTypes as $type)
                            @if($record->type ==$type->value)
                                <option selected value="{{$type->value}}">{{$type->value}}</option>
                            @else
                                <option value="{{$type->value}}">{{$type->value}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    @if ($record->image)
                    <label for="">Preview</label>
                       <img style="vertical-align:middle" src="{{asset($record->image)}}" alt="user image" width=100 height=100> 
                    @endif
                </div>
                <div>
                    <label for="">Image</label>
                    <input type="file" name="image" id="">
                </div>
                <div>
                    <input type="submit" value="Update">
                </div>
            </form>
            <hr>
        </div>
        <div>
            <span style="color:red">*</span> Reuired
        </div>
    </div>
@endsection
