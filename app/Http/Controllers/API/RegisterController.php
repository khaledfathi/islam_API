<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Register\StoreRegisterRequest;
use App\Repository\Contract\UserRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public UserRepositoryContract $userProvider; 
    public function __construct(
        UserRepositoryContract $userProvider
    )
    {
        $this->userProvider = $userProvider;  
    }
    public function store(StoreRegisterRequest $request){
        //preparing data to store 
        $data = [
            'name'=>$request->name, 
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'password'=>Hash::make($request->password),
            'type' =>$request->type,
        ]; 
        //store image file
        if ($request->has('file')){
            $file = $request->file('file'); 
            $data['image']=uploadeFile($file , 'user-image'); 
        }

        $record = $this->userProvider->store($data); 
        return response()->json([
            'status'=>true,
            'msg'=>"User has been stored .",
            'record'=>$record
        ]); 
 
    }
    public function create(){
        $data = $this->userProvider->create();                
        $data['type'] ="required , accept these value [ 'user' , 'suppler' , 'doctor']";
        return response()->json([
            'data'=>$data
        ]); 
    }
}
