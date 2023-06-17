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
                    <th>User</th>
                    <th>Product Name</th>
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
                                <td>{{ $product->product_id }}</td>
                                @if($product->user_id)
                                    <td>User ID:{{ $product->user_id }} | {{$product->user_name}} | {{$product->user_type}}</td>
                                @else
                                    <td>NULL</td>
                                @endif
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->description }}</td>
                                @if ($product->product_image)
                                    <td><a href="{{ asset($product->product_image) }}">Image</a></td>
                                @else
                                    <td>---</td>
                                @endif
                                <td><a href="{{ route('product.edit', $product->product_id) }}">Edit</a></td>
                                <td><a href="{{ route('product.destroy', $product->product_id) }}">Delete</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        {{-- / user data --}}
    </div>
@endsection
