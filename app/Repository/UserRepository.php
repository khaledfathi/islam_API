<?php 
namespace App\Repository;
use App\Models\User as UserModel;
use App\Repository\Contract\UserRepositoryContract; 

class UserRepository implements UserRepositoryContract{
    public function index ():object 
    {
        return UserModel::get(); 
    }
}