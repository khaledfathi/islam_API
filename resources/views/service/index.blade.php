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
                    <th>User </th>
                    <th>Service Name</th>
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
                    @if ($services)
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                @if ($service->user_id)
                                    <td>ID:{{ $service->user_id }} | {{ $service->user_name }} | {{ $service->user_type }}</td>
                                @else
                                    <td>NULL</td>
                                @endif
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->phone }}</td>
                                <td>{{ $service->address }}</td>
                                <td>{{ $service->working_hours }}</td>
                                <td>{{ $service->description }}</td>
                                <td>{{ $service->service_type }}</td>
                                <td>{{ $service->animal_type }}</td>
                                <td><a href="{{route('service.edit' , $service->id)}}">Edit</a></td>
                                <td><a href="{{route('service.destroy' , $service->id)}}">Delete</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        {{-- / service data --}}
@endsection
