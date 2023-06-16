<?php 
namespace App\Repository;
use App\Models\User as UserModel;
use App\Repository\Contract\UserRepositoryContract; 

class UserRepository implements UserRepositoryContract{
    public function index ():object 
    {
        return UserModel::get(); 
    }
    public function store (array $data ):object 
    {
        return UserModel::create($data); 
    } 
    public function create():array
    {
        return [
            'name'=>'required ',
            'email' => 'required , unique , email only',
            'password'=>'required', 
            'type' => "required , accept these value ['admin' , 'user' , 'suppler' , 'doctor']",
            'phone'=> 'optional , number only ',
            'image'=> 'optional , accepted type [jpg,jpge,bmp,png,tiff,webp,heif] , max size: 10000 KB ',
        ]; 
    }
public function show(mixed $id):object | null
    {
        return UserModel::where('id', $id)->first(); 
    }
    public function edit(mixed $id):object | null
    {
        return UserModel::where('id', $id)->first(); 
    } 
    public function update(array $data , int $id):bool
    {
        $found = UserModel::find($id); 
        return ($found)? $found->update($data):false; 
    }
    public function destroy(int $id):bool
    {
        $found = UserModel::find($id); 
        return ($found) ? $found->delete(): false ; 
    }
}