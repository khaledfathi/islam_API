<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repository\Contract\UserRepositoryContract;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public UserRepositoryContract $userProvider ; 
    public function __construct(
        UserRepositoryContract $userProvider
    )
    {
        $this->userProvider = $userProvider; 
    }
    public function index (){
        $users = $this->userProvider->index(); 
        return view('user.index', ['users' => $users]); 
    }
    public function store (Request $request)
    {

    } 
    public function show(Request $request)
    {
    }  
    public function edit(Request $request)
    {
        return "user edit page ";
    } 
    public function update(Request $request)
    {

    } 
    public function destroy(Request $request)
    {
        $this->userProvider->destroy($request->id); 
        return back(); 
    }

}
