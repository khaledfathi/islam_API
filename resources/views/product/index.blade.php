@extends('layout.main')
@section('title', 'Product')
@section('active-product' , 'active-button')
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
            <a href="{{route('product.create')}}" class="user-button">New Product</a>
        </div>
        {{-- user data --}}
        <div>
            <table>
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @if ($products)
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->description }}</td>
                                @if ($product->image)
                                    <td><a href="{{ asset($product->image) }}">Image</a></td>
                                @else
                                    <td>---</td>
                                @endif
                                <td><a href="{{ route('product.edit', $product->id) }}">Edit</a></td>
                                <td><a href="{{ route('product.destroy', $product->id) }}">Delete</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        {{-- / user data --}}
    </div>
@endsection
