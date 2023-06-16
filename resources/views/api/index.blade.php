@extends('layout.main')
@section('title', 'API')
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/api/style.css') }}">
@endsection

@section('scripts', '')


@section('content')
    <div>
        <h3>API links</h3>
        <hr>
    </div>
    {{-- users API --}}
    <div>
        <h3>Users CRUD API</h3>
        <table>
            <thead>
                <th>URL</th>
                <th>Method</th>
                <th>Parameter</th>
                <th>Action</th>
                <th>Response</th>
            </thead>
            <tbody>
                <tr>
                    <td>http://localhost/api/user</td>
                    <td>GET</td>
                    <td> --- </td>
                    <td>list all users</td>
                    <td>{data:[...{}]}</td>
                </tr>
                <tr>
                    <td>http://localhost/api/user/create</td>
                    <td>GET</td>
                    <td> --- </td>
                    <td>show table details</td>
                    <td>{data:{}}</td>
                </tr>
                <tr>
                    <td>http://localhost/api/user/{id}/edit</td>
                    <td>GET</td>
                    <td>{id} user id</td>
                    <td>get user record</td>
                    <td>{data:{}}</td>
                </tr>
                <tr>
                    <td>http://localhost/api/user/{id}</td>
                    <td>GET</td>
                    <td>{id} user id</td>
                    <td>show specific user by its ID</td>
                    <td>{status:false , msg:string , data=[empty]} | {status:true , data:{}}</td>
                </tr>
                <tr>
                    <td>http://localhost/api/user</td>
                    <td>POST</td>
                    <td> --- </td>
                    <td>store new user</td>
                    <td>{status:false , msg:string , errors:[]} | {status:true , msg:string , record:{}}</td>
                </tr>
                <tr>
                    <td>http://localhost/api/user/{id}/update</td>
                    <td>POST</td>
                    <td>{id} user id</td>
                    <td>update user by its ID</td>
                    <td>{status:false , msg:string , errors:[]} | {status:true , msg:string }</td>
                </tr>
                <tr>
                    <td>http://localhost/api/user/{id}</td>
                    <td>DELETE</td>
                    <td>{id} user id</td>
                    <td>delete user by its ID</td>
                    <td>{status:false , msg:string} | {status:true , msg:string}</td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- /users API --}}
@endsection
