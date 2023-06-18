@extends('layout.main')
@section('title', 'Users')
@section('active-user' , 'active-button')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/user/style.css')}}">
@endsection
@section('scripts', '')


@section('content')
    <div>
        <div>
            <h3>Users Table</h3>
        </div>
        <div>
            <a class="user-button" href="{{route('user.create')}}">New User</a>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Phone</th>
                    <th>address</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @if ($users)
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->type }}</td>
                                <td>{{ $user->phone }}</td>
                                <td><pre>{{ $user->address }}<pre></td>
                                @if ($user->image)
                                    <td><a href="{{ asset($user->image) }}">Image</a></td>
                                @else
                                    <td>---</td>
                                @endif
                                <td><a href="{{route('user.edit' , $user->id)}}">Edit</a></td>
                                <td><a href="{{route('user.destroy' , $user->id)}}">Delete</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        {{-- / user data --}}
    </div>
@endsection
