<?php

namespace App\Http\Controllers\API\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\User\StoreUserRequest;
use App\Http\Requests\API\User\UpdateUserRequest;
use App\Models\User as UserModel;
use App\Repository\Contract\UserRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public UserRepositoryContract $uesrProvider ; 
    public function __construct(
        UserRepositoryContract $userProvider
    ){
        $this->uesrProvider = $userProvider; 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data'=>$this->uesrProvider->index(),
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'data'=>$this->uesrProvider->create() 
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

        $record = $this->uesrProvider->store($data); 
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
        $found = $this->uesrProvider->show($request->id); 
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
        $found = $this->uesrProvider->edit($request->id); 
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
        $found = $this->uesrProvider->show($request->id);
        if ($found){            
            if ($request->has('file')){
                $file= $request->file('file'); 
                $data['image']=uploadeFile($file , 'user-image'); 

                ($found->image)?Storage::delete($found->image): null;
            }
            ($request->has('password'))?Hash::make($request->password):null; 
            $update = $this->uesrProvider->update($data , $request->id);
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
    public function destroy(Request $request)
    {
        $record  = $this->uesrProvider->show($request->id);
        if ($record){
            ($record->image)?Storage::delete($record->image):null; 
            $this->uesrProvider->destroy($request->id); 
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
