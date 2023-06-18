@extends('layout.main')
@section('title', 'Users')
@section('active-blog' , 'active-button')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/blog/style.css')}}">
@endsection
@section('scripts', '')


@section('content')
    <div>
        <div>
            <h3>Blog Table</h3>
        </div>
        <div>
            <a class="user-button" href="{{route('blog.create')}}">New Post</a>
        </div>
        {{-- user data --}}
        <div>
            <div>
                @if($errors->any())
                    <h3 style="color:red">ERROR : {{$errors->first()}}</h3>
                @endif
            </div>
            <table>
                <thead>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Time</th>
                    <th>Title</th>
                    <th>abstract</th>
                    <th>artical</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @if ($blogs)
                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $blog->blog_id }}</td>
                                @if ($blog->user_name)
                                    <td>ID:{{ $blog->user_id }} | {{$blog->user_name}} | {{$blog->user_type}}</td>
                                @else 
                                    <td>NULL</td>
                                @endif
                                <td>{{ $blog->time }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>
                                    @if ($blog->abstract)
                                        <a href="{{route('blog.show' , $blog->blog_id)}}">View Post</a>
                                    @else
                                        Empty
                                    @endif
                                </td>
                                <td>
                                    @if ($blog->article)
                                        <a href="{{route('blog.show' , $blog->blog_id)}}">View Post</a>
                                    @else
                                        Empty
                                    @endif
                                </td>
                                <td><a href="{{route('blog.edit' , $blog->blog_id)}}">Edit</a></td>
                                <td><a href="{{route('blog.destroy' , $blog->blog_id)}}">Delete</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        {{-- / user data --}}
    </div>
@endsection
