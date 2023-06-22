@extends('layout.main')
@section('title', 'backup')
{{-- @section('active-user' , 'active-button') --}}
@section('links')
    {{-- <link rel="stylesheet" href="{{asset('assets/css/user/style.css')}}"> --}}
@endsection
@section('scripts', '')

@section('content')
    <div>
        <div>
            <h3>Import/Export</h3>
        </div>
        <div>
            <div>
                <label for="">Expot </label>
                <a href="{{route('backup.exportDB')}}">Download Database Backup</a>
                <a href="{{route('backup.exportFiles')}}">Download Files Backup</a>
            </div>
            <div>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="">Import Database</label>
                        <input type="file" name="db-files" id="">
                    </div>
                    <div>
                        <label for="">Import Files</label>
                        <input type="file" name="image-files" id="">
                    </div>
                    <div>
                        <input type="submit" value="Upload">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
