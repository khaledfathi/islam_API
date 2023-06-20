@extends('layout.main')
@section('title', 'Product | Create')
@section('active-product', 'active-button')
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/product/create.css') }}">
@endsection
@section('scripts', '')


@section('content')
    <div>
        <div>
            <h3>Create New Product</h3>
        </div>
        <div class="errors">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p style="color:red;">Error : {{ $error }}</p>
                @endforeach
            @endif
        </div>
        <div>
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="">Name<span style="color:red">*</span></label>
                    <input type="text" name="name" id="" required>
                </div>
                <div>
                    <label for="">Price<span style="color:red">*</span></label>
                    <input type="number" name="price" id="" required>
                </div>
                <div>
                    <label for="">User<span style="color:red">*</span></label>
                    <select name="user_id">
                        <option selected value="">NULL</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">ID:{{ $user->id }} | {{ $user->name }} | {{$user->type}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Category<span style="color:red">*</span></label>
                    <select name="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->value }}">{{ $category->value }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Description</label>
                    <textarea style="resize:none;vertical-align:middle" name="description" id="" cols="30" rows="5"></textarea>
                </div>
                <div>
                    <label for="">Status<span style="color:red">*</span></label>
                    <select name="approval" id="">
                        @foreach ($approval as $status)
                            <option value="{{$status->value}}">{{$status->value}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Image<span style="color:red">*</label>
                    <input type="file" name="image" id="">
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
