<?php

namespace App\Http\Controllers\API\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\User\StoreUserRequest;
use App\Http\Requests\API\User\UpdateUserRequest;
use App\Models\User as UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //PRIVATE METHOD
        //

    //PUBLIC METHOD 

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data'=>UserModel::get(),
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'data'=>[
                'name'=>'required ',
                'email' => 'required , unique , email only',
                'password'=>'required', 
                'type' => "required , accept these value ['admin' , 'user' , 'suppler' , 'doctor']",
                'phone'=> 'optional , number only ',
                'image'=> 'optional , accepted type [jpg,jpge,bmp,png,tiff,webp,heif] , max size: 10000 KB ',
            ]
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //preparing data to store 
        $data = [
            'name'=>$request->name, 
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
            'type' =>$request->type,
        ]; 
        //store image file
        if ($request->has('file')){
            $file = $request->file('file'); 
            $data['image']=uploadeFile($file , 'user-image'); 
        }

        $record = UserModel::create($data); 
        return response()->json([
            'status'=>true,
            'msg'=>"User has been stored .",
            'record'=>$record
        ]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $found = UserModel::find($request->id); 
        if ($found){
            return response()->json([
                'status'=>true,
                'data'=>$found,
            ]); 
        }
        return response()->json([
            'status'=>false,
            'msg'=>'User is not exist !',
            'data'=>[],
        ]); 
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $found = UserModel::find($request->id); 
        if ($found){
            return response()->json([
                'status'=>true,
                'data'=>$found,
            ]);
        }
        return response()->json([
            'status'=>false,
            'msg'=>'User is not exist !',
            'data'=>[],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request)
    {
        //prepearing data
        $data = (array)$request->all(); 
        $found = UserModel::find($request->id);
        if ($found){            
            if ($request->has('file')){
                $file= $request->file('file'); 
                $data['image']=uploadeFile($file , 'user-image'); 

                ($found->image)?Storage::delete($found->image): null;
            }
            ($request->has('password'))?Hash::make($request->password):null; 
            $update = $found->update($data);
            if ($update){
                return response()->json([
                    'status'=>true,
                    'msg'=>'User has been updated .'
                ]);
            }else {
                 return response()->json([
                    'status'=>false,
                    'msg'=>'Validation error', 
                ]);
               
            }
        }
            return response()->json([
                'status'=>false,
                'msg'=>'user is not exist !'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $found = UserModel::find($id); 
        if ($found){
            ($found->image)?Storage::delete($found->image):null; 
            $found->delete(); 
            return response()->json([
                'status'=>true,
                'msg'=>'User has been deleted successfuly .'
            ]); 
        }
        return response()->json([
                'status'=>false,
                'msg'=>'User is not exist !',
            ]); 
    }    
}
