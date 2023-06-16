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
                    <select name="user_id"  >
                        <option value="">NULL</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                <div>
                    <label for="">Category<span style="color:red">*</span></label>
                    <select name="category"  >
                        <option value="food">43</option>
                        <option value="toys">43</option>
                        <option value="toys">43</option>
                    </select>
                </div>
                <div>
                    <label for="">Description</label>
                    <textarea style="resize:none;vertical-align:middle" name="description" id="" cols="30" rows="5"></textarea>
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
