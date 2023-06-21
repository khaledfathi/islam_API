@extends('layout.main')
@section('title', 'Schema')
@section('active-schema' , 'active-button')
@section('links','')
@section('scripts', '')


@section('content')
        <div>
            <h3>Database Schema</h3>
        </div>
        <div>
            <img style="width:100vw" src="{{asset('assets/images/schema_image.svg')}}" alt="schema">
        </div>
@endsection
