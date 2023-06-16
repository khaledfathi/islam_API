<?php

namespace App\Http\Controllers\User;

use App\Enum\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\User\StoreUserRequest;
use App\Http\Requests\Web\User\UpdateUserRequest;
use App\Repository\Contract\UserRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
    public function store (StoreUserRequest $request)
    {
        //pereparing data 
        $data=[
            'name'=>$request->name, 
            'email'=>$request->email, 
            'phone'=>$request->phone, 
            'password'=>$request->password,
            'type'=>$request->type,
        ]; 
        if($request->image){
            $data['image']= uploadeFile($request->file('image'), 'user-image'); 
        }
        $this->userProvider->store($data); 
        return redirect(route('user.index'))->with(['ok'=>'User has been stored .']); 
    } 
    public function create(){
        $userTypes= UserType::cases(); 
        return view('user.create', [
            'userTypes'=>$userTypes
        ]); 
    }
    public function show(Request $request)
    {
    }  
    public function edit(Request $request)
    {
        $record = $this->userProvider->show($request->id); 
        $userTypes= UserType::cases(); 
        return view('user.edit',[
            'userTypes'=>$userTypes,
            'record'=>$record 
        ]);
    } 
    public function update(UpdateUserRequest $request)
    {
        //prepearing data
        $data = [
            'name'=>$request->name, 
            'email'=>$request->email, 
            'phone'=>$request->phone, 
            'type'=>$request->type,
        ]; 
        if ($request->password){
            $data['password']=Hash::make($request->password); 
        }
        $record = $this->userProvider->show($request->id);
        if ($record){            
            if ($request->image){
                $file= $request->file('image'); 
                $data['image']=uploadeFile($file , 'user-image'); 
                //delete old file
                File::delete($record->image);
            }
            ($request->has('password'))?Hash::make($request->password):null; 
            //update
            $update = $this->userProvider->update($data , $request->id);
            return redirect(route('user.index'))->with(['ok'=>'User has been updated. ']); 
        }
        return back(); 
    } 
    public function destroy(Request $request)
    {
        $record = $this->userProvider->show($request->id); 
        if ($record){
            File::delete($record->image);
            $this->userProvider->destroy($request->id); 
        }
        return back(); 
    }

}
