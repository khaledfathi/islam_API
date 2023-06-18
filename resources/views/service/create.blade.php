@extends('layout.main')
@section('title', 'Users | Create')
@section('active-service' , 'active-button')
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/service/create.css') }}">
@endsection
@section('scripts', '')


@section('content')
    <div>
        <div>
            <h3>Create New Service</h3>
        </div>
        <div class="errors">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p style="color:red;">Error : {{$error}}</p>
                @endforeach
            @endif
        </div>
        <div>
            <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="">Name<span style="color:red">*</span></label>
                    <input type="text" name="name" id="" required>
                </div>
                <div>
                    <label for="">Phone<span style="color:red">*</label>
                    <input type="text" name="phone" id="" required>
                </div>
                <div>
                    <label for="">Address<span style="color:red">*</label>
                    <textarea style="resize:none;vertical-align:middle" name="address" id="" cols="30" rows="5" required></textarea>
                </div>
                <div>
                    <label for="">Working Hours<span style="color:red">*</label>
                    <input type="text" name="working_hours" id="">
                </div>
                <div>
                    <label for="">Description</label>
                    <textarea style="resize:none;vertical-align:middle" name="description" id="" cols="30" rows="5"></textarea>
                </div>
                <div>
                    <label for="">Service Type<span style="color:red">*</label>
                    <select name="service_type" id="" >
                        <option value="">service 1 </option>
                        <option value="">service 2 </option>
                        <option value="">service 2 </option>
                    </select>
                </div>
                <div>
                    <label for="">Animal Type</label>
                    <select name="animal_type" id="">
                        <option value="">animal 1 </option>
                        <option value="">animal 2 </option>
                        <option value="">animal 3 </option>
                    </select>
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
