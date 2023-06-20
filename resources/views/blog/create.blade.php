@extends('layout.main')
@section('title', 'Blog | Create')
@section('active-blog' , 'active-button')
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/blog/create.css') }}">
@endsection

@section('scripts')
    <script src="{{asset('assets/js/blog/js.js')}}"></script>
@endsection

@section('content')
    <div>
        <div>
            <h3>Create New Post</h3>
        </div>
        <div class="errors">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p style="color:red;">Error : {{$error}}</p>
                @endforeach
            @endif
        </div>
        <div>
            <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="">Time<span style="color:red">*</span></label>
                    <input type="datetime-local" name="time" id="date-time" required>
                </div>
                <div>
                    <label for="">Author<span style="color:red">*</span></label>
                    <select name="user_id" id="">
                        <option value="">NULL</option>
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">ID:{{$user->id}} | {{$user->name}} | {{$user->type}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Title<span style="color:red">*</span></label>
                    <input type="text" name="title" id="" required>
                </div>
                <div>
                    <label for="">Abstract</label>
                    <textarea style="resize:none;vertical-align:middle" name="abstract" id="" cols="30" rows="5"></textarea>
                </div>
                <div>
                    <label for="">Article</label>
                    <textarea style="resize:none;vertical-align:middle" name="article" id="" cols="30" rows="5"></textarea>
                </div>
                <div>
                    <label for="">Image</label>
                    <input type="file" name="image">
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
