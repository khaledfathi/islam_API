@extends('layout.main')
@section('title', 'API')
@section('active-api', 'active-button')
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

    
    {{-- product API --}}
    <br><br>
    <div>
        <h3>Product CRUD API</h3>
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
                    <td>http://localhost/api/product</td>
                    <td>GET</td>
                    <td> --- </td>
                    <td>list all product</td>
                    <td>{data:[...{}]}</td>
                </tr>
                <tr>
                    <td>http://localhost/api/product/create</td>
                    <td>GET</td>
                    <td> --- </td>
                    <td>show table details</td>
                    <td>{data:{}}</td>
                </tr>
                <tr>
                    <td>http://localhost/api/product/{id}/edit</td>
                    <td>GET</td>
                    <td>{id} product id</td>
                    <td>get product record</td>
                    <td>{data:{}}</td>
                </tr>
                <tr>
                    <td>http://localhost/api/product/{id}</td>
                    <td>GET</td>
                    <td>{id} product id</td>
                    <td>show specific product by its ID</td>
                    <td>{status:false , msg:string , data=[empty]} | {status:true , data:{}}</td>
                </tr>
                <tr>
                    <td>http://localhost/api/product</td>
                    <td>POST</td>
                    <td> --- </td>
                    <td>store new product</td>
                    <td>{status:false , msg:string , errors:[]} | {status:true , msg:string , record:{}}</td>
                </tr>
                <tr>
                    <td>http://localhost/api/product/{id}/update</td>
                    <td>POST</td>
                    <td>{id} product id</td>
                    <td>update product by its ID</td>
                    <td>{status:false , msg:string , errors:[]} | {status:true , msg:string }</td>
                </tr>
                <tr>
                    <td>http://localhost/api/product/{id}</td>
                    <td>DELETE</td>
                    <td>{id} product id</td>
                    <td>delete product by its ID</td>
                    <td>{status:false , msg:string} | {status:true , msg:string}</td>
                </tr>
            </tbody>
        </table>
        <br><br>
    </div>
    {{-- / product API --}}

    {{-- register API --}}
    <div>
        <h3>Register User API</h3>
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
                    <td>http://localhost/api/register</td>
                    <td>POST</td>
                    <td> --- </td>
                    <td>Register a New User </td>
                    <td>{status:false , msg:string , errors:[]} | {status:true , msg:string }</td>
                </tr>
                <tr>
                    <td>http://localhost/api/product/create</td>
                    <td>GET</td>
                    <td> --- </td>
                    <td>show table details</td>
                    <td>{data:{}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- / register API --}}
   
    <br><br><br><br><br><br>
@endsection
