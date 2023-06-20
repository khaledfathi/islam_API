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
                <th>URI</th>
                <th>Method</th>
                <th>Parameter</th>
                <th>Action</th>
                <th>Response</th>
            </thead>
            <tbody>
                <tr>
                    <td>/api/user</td>
                    <td>GET</td>
                    <td> --- </td>
                    <td>list all users</td>
                    <td>{data:[...{}]}</td>
                </tr>
                <tr>
                    <td>/api/user/create</td>
                    <td>GET</td>
                    <td> --- </td>
                    <td>show table details</td>
                    <td>{data:{}}</td>
                </tr>
                <tr>
                    <td>/api/user/{id}/edit</td>
                    <td>GET</td>
                    <td>{id} user id</td>
                    <td>get user record</td>
                    <td>{data:{}}</td>
                </tr>
                <tr>
                    <td>/api/user/{id}</td>
                    <td>GET</td>
                    <td>{id} user id</td>
                    <td>show specific user by its ID</td>
                    <td>{status:false , msg:string , data=[empty]} | {status:true , data:{}}</td>
                </tr>
                <tr>
                    <td>/api/user</td>
                    <td>POST</td>
                    <td> --- </td>
                    <td>store new user</td>
                    <td>{status:false , msg:string , errors:[]} | {status:true , msg:string , record:{}}</td>
                </tr>
                <tr>
                    <td>/api/user/{id}/update</td>
                    <td>POST</td>
                    <td>{id} user id</td>
                    <td>update user by its ID</td>
                    <td>{status:false , msg:string , errors:[]} | {status:true , msg:string }</td>
                </tr>
                <tr>
                    <td>/api/user/{id}</td>
                    <td>DELETE</td>
                    <td>{id} user id</td>
                    <td>delete user by its ID</td>
                    <td>{status:false , msg:string} | {status:true , msg:string}</td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- /users API --}}


    {{-- products API --}}
    <br><br>
    <div>
        <h3>Products CRUD API</h3>
        <table>
            <thead>
                <th>URI</th>
                <th>Method</th>
                <th>Parameter</th>
                <th>Action</th>
                <th>Response</th>
            </thead>
            <tbody>
                <tr>
                    <td>/api/product</td>
                    <td>GET</td>
                    <td> --- </td>
                    <td>list all product</td>
                    <td>{data:[...{}]}</td>
                </tr>
                <tr>
                    <td>/api/product/create</td>
                    <td>GET</td>
                    <td> --- </td>
                    <td>show table details</td>
                    <td>{data:{}}</td>
                </tr>
                <tr>
                    <td>/api/product/{id}/edit</td>
                    <td>GET</td>
                    <td>{id} product id</td>
                    <td>get product record</td>
                    <td>{data:{}}</td>
                </tr>
                <tr>
                    <td>/api/product/{id}</td>
                    <td>GET</td>
                    <td>{id} product id</td>
                    <td>show specific product by its ID</td>
                    <td>{status:false , msg:string , data=[empty]} | {status:true , data:{}}</td>
                </tr>
                <tr>
                    <td>/api/product</td>
                    <td>POST</td>
                    <td> --- </td>
                    <td>store new product</td>
                    <td>{status:false , msg:string , errors:[]} | {status:true , msg:string , record:{}}</td>
                </tr>
                <tr>
                    <td>/api/product/{id}/update</td>
                    <td>POST</td>
                    <td>{id} product id</td>
                    <td>update product by its ID</td>
                    <td>{status:false , msg:string , errors:[]} | {status:true , msg:string }</td>
                </tr>
                <tr>
                    <td>/api/product/{id}</td>
                    <td>DELETE</td>
                    <td>{id} product id</td>
                    <td>delete product by its ID</td>
                    <td>{status:false , msg:string} | {status:true , msg:string}</td>
                </tr>
                <tr style="background-color:lightgray">
                    <td>/api/product/filter/category/{category}</td>
                    <td>GET</td>
                    <td>{category} allowed [food,toys,accessories,beds,grooming]</td>
                    <td>filter product by category</td>
                    <td>{data:[...{}]}</td>
                </tr>
            </tbody>
        </table>
        <br><br>
    </div>
    {{-- / products API --}}

    {{-- Blog CRUD API --}}
    <div>
        <h3>Blogs CRUD API</h3>
        <table>
            <thead>
                <th>URI</th>
                <th>Method</th>
                <th>Parameter</th>
                <th>Action</th>
                <th>Response</th>
            </thead>
            <tbody>
                <tr>
                    <td>/api/blog</td>
                    <td>GET</td>
                    <td> --- </td>
                    <td>list all Blogs</td>
                    <td>{data:[...{}]}</td>
                </tr>
                <tr>
                    <td>/api/blogs/create</td>
                    <td>GET</td>
                    <td> --- </td>
                    <td>show table details</td>
                    <td>{data:{}}</td>
                </tr>
                <tr>
                    <td>/api/blogs/{id}/edit</td>
                    <td>GET</td>
                    <td>{id} blogs id</td>
                    <td>get blog record</td>
                    <td>{data:{}}</td>
                </tr>
                <tr>
                    <td>/api/blog/{id}</td>
                    <td>GET</td>
                    <td>{id} blog id</td>
                    <td>show specific blog by its ID</td>
                    <td>{status:false , msg:string , data=[empty]} | {status:true , data:{}}</td>
                </tr>
                <tr>
                    <td>/api/blog</td>
                    <td>POST</td>
                    <td> --- </td>
                    <td>store new post on blog</td>
                    <td>{status:false , msg:string , errors:[]} | {status:true , msg:string , record:{}}</td>
                </tr>
                <tr>
                    <td>/api/blog/{id}/update</td>
                    <td>POST</td>
                    <td>{id} blog id</td>
                    <td>update blog by its ID</td>
                    <td>{status:false , msg:string , errors:[]} | {status:true , msg:string }</td>
                </tr>
                <tr>
                    <td>/api/blog/{id}</td>
                    <td>DELETE</td>
                    <td>{id} blog id</td>
                    <td>delete blog by its ID</td>
                    <td>{status:false , msg:string} | {status:true , msg:string}</td>
                </tr>
            </tbody>
        </table>
        <br><br>
    </div>
    {{-- / Blogs API --}}

    {{-- service CRUD API --}}
    <div>
        <h3>Services CRUD API</h3>
        <table>
            <thead>
                <th>URI</th>
                <th>Method</th>
                <th>Parameter</th>
                <th>Action</th>
                <th>Response</th>
            </thead>
            <tbody>
                <tr>
                    <td>/api/service</td>
                    <td>GET</td>
                    <td> --- </td>
                    <td>list all services</td>
                    <td>{data:[...{}]}</td>
                </tr>
                <tr>
                    <td>/api/service/create</td>
                    <td>GET</td>
                    <td> --- </td>
                    <td>show table details</td>
                    <td>{data:{}}</td>
                </tr>
                <tr>
                    <td>/api/service/{id}/edit</td>
                    <td>GET</td>
                    <td>{id} service id</td>
                    <td>get service record</td>
                    <td>{data:{}}</td>
                </tr>
                <tr>
                    <td>/api/service/{id}</td>
                    <td>GET</td>
                    <td>{id} service id</td>
                    <td>show specific service by its ID</td>
                    <td>{status:false , msg:string , data=[empty]} | {status:true , data:{}}</td>
                </tr>
                <tr>
                    <td>/api/service</td>
                    <td>POST</td>
                    <td> --- </td>
                    <td>store new post on service</td>
                    <td>{status:false , msg:string , errors:[]} | {status:true , msg:string , record:{}}</td>
                </tr>
                <tr>
                    <td>/api/service/{id}/update</td>
                    <td>POST</td>
                    <td>{id} service id</td>
                    <td>update service by its ID</td>
                    <td>{status:false , msg:string , errors:[]} | {status:true , msg:string }</td>
                </tr>
                <tr>
                    <td>/api/service/{id}</td>
                    <td>DELETE</td>
                    <td>{id} service id</td>
                    <td>delete service by its ID</td>
                    <td>{status:false , msg:string} | {status:true , msg:string}</td>
                </tr>
                <tr style="background-color:lightgray">
                    <td>/api/service/filter/service_type/{type}</td>
                    <td>GET</td>
                    <td>{type} service type [clinics , shelter]</td>
                    <td>index all service belong to this type</td>
                    <td>{data:[...{}]}</td>
                </tr>
                <tr style="background-color:lightgray">
                    <td>/api/service/filter/animal_type/{type}</td>
                    <td>GET</td>
                    <td>{type} animal type [dog , cat]</td>
                    <td>index all services that have this animal</td>
                    <td>{data:[...{}]}</td>
                </tr>

            </tbody>
        </table>
        <br><br>
    </div>
    {{-- / service API --}}


    {{-- register API --}}
    <div>
        <h3>Register User API</h3>
        <table>
            <thead>
                <th>URI</th>
                <th>Method</th>
                <th>Parameter</th>
                <th>Action</th>
                <th>Response</th>
            </thead>
            <tbody>

                <tr>
                    <td>/api/register</td>
                    <td>POST</td>
                    <td> --- </td>
                    <td>Register a New User </td>
                    <td>{status:false , msg:string , errors:[]} | {status:true , msg:string }</td>
                </tr>
                <tr>
                    <td>/api/register/create</td>
                    <td>GET</td>
                    <td> --- </td>
                    <td>show table details</td>
                    <td>{data:{}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <br><br>
    {{-- / register API --}}

    {{-- auth  API --}}
    <div>
        <h3> Auth Login API</h3>
        <table>
            <thead>
                <th>URI</th>
                <th>Method</th>
                <th>Parameter</th>
                <th>Action</th>
                <th>Response</th>
            </thead>
            <tbody>
                <tr>
                    <td>/api/auth/login</td>
                    <td>POST</td>
                    <td> --- </td>
                    <td>authenticate user to login</td>
                    <td>{status:false , msg:string} | {status:true , msg:string , record:{}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <br><br>
    {{-- / auth API --}}
    <h3><a href="{{ route('download.postman') }}">Download Postman API examples</a></h3>

    <br><br><br><br><br><br>
@endsection
