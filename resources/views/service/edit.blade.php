@extends('layout.main')
@section('title', 'Service | Edit')
@section('active-service', 'active-button')
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/service/edit.css') }}">
@endsection
@section('scripts', '')


@section('content')
    <div>
        <div>
            <h3>Edit Service</h3>
        </div>
        <div class="errors">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p style="color:red;">Error : {{ $error }}</p>
                @endforeach
            @endif
        </div>
        <div>
            <form action="{{ route('service.update') }}" method="get">
                @csrf
                <input type="hidden" name="id" value="{{$record->id}}">
                <div>
                    <label for="">User<span style="color:red">*</span></label>
                    <select name="user_id" id="">
                        @if (!$record->user_id)
                            <option selected value="">NULL</option>
                        @else
                            <option value="">NULL</option>
                        @endif
                        @foreach ($users as $user)
                            @if ($record->user_id == $user->id)
                                <option selected value="{{ $user->id }}">ID:{{ $user->id }} | {{ $user->name }} |
                                    {{ $user->type }}</option>
                            @else
                                <option value="{{ $user->id }}">ID:{{ $user->id }} | {{ $user->name }} |
                                    {{ $user->type }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Name<span style="color:red">*</span></label>
                    <input type="text" name="name" id="" required value="{{ $record->name }}">
                </div>
                <div>
                    <label for="">Phone<span style="color:red">*</label>
                    <input type="text" name="phone" id="" required value="{{ $record->phone }}">
                </div>
                <div>
                    <label for="">Address<span style="color:red">*</label>
                    <textarea style="resize:none;vertical-align:middle" name="address" id="" cols="30" rows="5"
                        required>{{ $record->address }}</textarea>
                </div>
                <div>
                    <label for="">Working Hours<span style="color:red">*</label>
                    <input type="text" name="working_hours" id="" value="{{ $record->working_hours }}">
                </div>
                <div>
                    <label for="">Description</label>
                    <textarea style="resize:none;vertical-align:middle" name="description" id="" cols="30" rows="5">{{ $record->description }}</textarea>
                </div>
                <div>
                    <label for="">Approval<span style="color:red">*</label>
                    <select name="approval" id="">
                        @foreach ($approval as $type)
                            @if ($record->approval == $type->value)
                                <option selected value="{{ $type->value }}">{{ $type->value }}</option>
                            @else
                                <option value="{{ $type->value }}">{{ $type->value }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Service Type<span style="color:red">*</label>
                    <select name="service_type" id="">
                        @foreach ($serviceTypes as $type)
                            @if ($record->service_type == $type->value)
                                <option selected value="{{ $type->value }}">{{ $type->value }}</option>
                            @else
                                <option value="{{ $type->value }}">{{ $type->value }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Animal Type</label>
                    <select name="animal_type" id="">
                        @foreach ($animalTypes as $type)
                            @if ($record->animal_type == $type->value)
                                <option selected value="{{ $type->value }}">{{ $type->value }}</option>
                            @else
                                <option value="{{ $type->value }}">{{ $type->value }}</option>
                            @endif
                        @endforeach
                    </select>
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
