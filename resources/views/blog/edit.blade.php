@extends('layout.main')
@section('title', 'Blog | Edit')
@section('active-blog', 'active-button')
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/blog/create.css') }}">
@endsection
@section('scripts' , '')


@section('content')
    <div>
        <div>
            <h3>Edit Post</h3>
        </div>
        <div class="errors">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p style="color:red;">Error : {{ $error }}</p>
                @endforeach
            @endif
        </div>
        <div>
            <form action="{{ route('blog.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$record->id}}">
                <div>
                    <label for="">Time<span style="color:red">*</span></label>
                    <input type="datetime-local" name="time" id="date-time" required
                        value="{{ substr($record->time , 0, -3) }}">
                </div>
                <div>
                    <label for="">Author<span style="color:red">*</span></label>
                    <select name="user_id" id="">
                        @if (!$record->user_id)
                            <option selected value="">NULL</option>
                        @else 
                            <option value="">NULL</option>
                        @endif

                        @foreach ($users as $user)
                            @if ($record->user_id == $user->id)
                                <option selected value="{{ $user->id }}">ID:{{ $user->id }} | {{ $user->name }} |
                                    {{ $user->type }}</option>
                            @endif
                            <option value="{{ $user->id }}">ID:{{ $user->id }} | {{ $user->name }} |
                                {{ $user->type }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Title<span style="color:red">*</span></label>
                    <input type="text" name="title" id="" required value="{{$record->title}}">
                </div>
                <div>
                    <label for="">Abstract</label>
                    <textarea style="resize:none;vertical-align:middle" name="abstract" id="" cols="30" rows="5">{{$record->abstract}}</textarea>
                </div>
                <div>
                    <label for="">Article</label>
                    <textarea style="resize:none;vertical-align:middle" name="article" id="" cols="30" rows="5">{{$record->article}}</textarea>
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
