@extends('layout.main')
@section('title', 'Services')
@section('active-service' , 'active-button')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/service/style.css')}}">
@endsection
@section('scripts', '')


@section('content')
        <div>
            <h3>Service Table</h3>
        </div>
        <div>
            <a class="user-button" href="{{route('service.create')}}">New Service</a>
        </div>
        {{-- service data --}}
        <div>
            <div>
                @if($errors->any())
                    <h3 style="color:red">ERROR : {{$errors->first()}}</h3>
                @endif
            </div>
            <table>
                <thead>
                    <th>ID</th>
                    <th>user_id</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>address</th>
                    <th>working_hours</th>
                    <th>description</th>
                    <th>service_type</th>
                    <th>animal_type</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    {{-- @if ($users)
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
                    @endif --}}
                </tbody>
            </table>
        </div>
        {{-- / service data --}}
@endsection
