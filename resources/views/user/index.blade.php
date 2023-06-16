@extends('layout.main')
@section('title', 'Users')
@section('links', '')
@section('scripts', '')


@section('content')
    <div>
        <h1>USERS PAGE</h1>
        {{-- all data --}}
        <div>

            <table>
                @if ($data)
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->type }}</td>
                            <td>{{ $row->phone }}</td>
                            @if ($row->image)
                                <td><a href="{{ asset($row->image) }}">Image</a></td>
                            @else
                                <td>---</td>
                            @endif
                        </tr>
                    @endforeach

                @endif
            </table>
        </div>
        {{-- / all data --}}

    </div>
@endsection
