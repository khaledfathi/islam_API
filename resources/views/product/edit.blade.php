@extends('layout.main')
@section('title', 'Product | Edit')
@section('active-product', 'active-button')
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/product/edit.css') }}">
@endsection
@section('scripts', '')


@section('content')
    <div>
        <div>
            <h3>Edit Product</h3>
        </div>
        <div class="errors">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p style="color:red;">Error : {{ $error }}</p>
                @endforeach
            @endif
        </div>
        <div>
            <form action="{{ route('product.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value={{$record->id}}>
                <div>
                    <label for="">Name<span style="color:red">*</span></label>
                    <input type="text" name="name" id="" required value="{{ $record->name }}">
                </div>
                <div>
                    <label for="">Price<span style="color:red">*</span></label>
                    <input type="number" name="price" id="" required value="{{ $record->price }}">
                </div>
                <div>
                    <label for="">User<span style="color:red">*</span></label>
                    <select name="user_id">
                        <option {{( ! $record->user_id)?'selected':null}} value="">NULL</option>
                        @foreach ($users as $user)
                            @if ($record->user_id == $user->id)
                                <option selected value="{{ $user->id }}">ID:{{ $user->id }} | {{ $user->name }} | {{$user->type}}</option>
                            @else
                                <option  value="{{ $user->id }}">ID:{{ $user->id }} | {{ $user->name }} | {{$user->type}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Category<span style="color:red">*</span></label>
                    <select name="category">
                        @foreach ($categories as $category)
                        @if ($record->category == $category->value)
                            <option selected value="{{ $category->value }}">{{ $category->value }}</option>
                        @else 
                            <option  value="{{ $category->value }}">{{ $category->value }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Description</label>
                    <textarea style="resize:none;vertical-align:middle" name="description" id="" cols="30" rows="5">{{ $record->description }}</textarea>
                </div>
                <div>
                    <label for="">Approval</label>
                    <select name="approval" id="">
                        @foreach ($approval as $status)
                        @if ($record->approval == $status->value)
                            <option selected value="{{$status->value}}">{{$status->value}}</option>
                        @else
                            <option value="{{$status->value}}">{{$status->value}}</option>
                        @endif
                        @endforeach
                    </select>

                </div>
                <div>
                    <label for="">Preview</label>
                    <img style="vertical-align:middle" src="{{ asset($record->image) }}" alt="product image" width="100"
                        height="100">
                </div>
                <div>
                    <label for="">Image<span style="color:red">*</label>
                    <input type="file" name="image" id="">
                </div>
                <div>
                    <input type="submit" value="Update">
                </div>

            </form>
            <hr>
        </div>
        <div>
            <span style="color:red">*</span> Reuired
        </div>
    </div>
@endsection
