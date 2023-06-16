@extends('layout.main')
@section('title', 'Product')
@section('links')
    <link rel="stylesheet" href="{{asset('assets/css/product/style.css')}}">
@endsection

@section('scripts', '')

@section('content')
    <div>
        <div>
            <h3>Product table</h3>
        </div>
        <div>
            <button class="user-button">New Product</button>
        </div>
        {{-- user data --}}
        <div>
            <table>
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Image</th>
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
                                @if ($user->image)
                                    <td><a href="{{ asset($user->image) }}">Image</a></td>
                                @else
                                    <td>---</td>
                                @endif
                                <td><a href="{{ route('user.edit', $user->id) }}">Edit</a></td>
                                <td><a href="{{ route('user.destroy', $user->id) }}">Delete</a></td>
                            </tr>
                        @endforeach
                    @endif --}}
                </tbody>
            </table>
        </div>
        {{-- / user data --}}
    </div>
@endsection
