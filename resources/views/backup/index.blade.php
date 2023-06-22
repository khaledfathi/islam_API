@extends('layout.main')
@section('title', 'backup')
@section('active-backup', 'active-button')
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/backup/style.css') }}">
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/backup/js.js') }}"></script>
@endsection

@section('content')
    <div>
        <div>
            <h3>Import/Export</h3>
        </div>
        <div>
            <div class="export">
                <label for="">Export </label>
                <button id="download">Download</button>
            </div>
            {{-- <div class="import">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="">Import</label>
                        <input type="file" name="file" id="">
                    </div>
                    <div>
                        <input type="submit" value="Upload">
                    </div>
                </form>
            </div> --}}
            <div class="msg-wrapper" id="msg-box">
                <div class="msg">
                    <h3>Preparing to backup . . . </h3>
                    <p>Please don't close this page , it may take a long time</p>
                </div>
            </div>
        </div>
    </div>
@endsection
