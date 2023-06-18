<?php 
namespace App\Repository;
use App\Models\BlogModel;
use App\Repository\Contract\BlogRepositoryContract; 

class BlogRepository implements BlogRepositoryContract {
    public function index (bool $leftJoinUsers=false):object 
    {
        if ($leftJoinUsers){
            return BlogModel::leftJoin('users' , 'users.id' , '=' , 'blogs.user_id')->select(
                'users.id as user_id',
                'users.name as user_name',
                'users.type as user_type',
                'blogs.id as blog_id', 
                'blogs.title',
                'blogs.time',
                'blogs.abstract',
                'blogs.article',
            )->get(); 
        }
        return BlogModel::get(); 
    }
    public function store (array $data):object 
    {
        return BlogModel::create($data); 
    }
    public function show(mixed $id , $leftJonUsers=false):object|null 
    {
        if ($leftJonUsers){
            return BlogModel::leftJoin('users' , 'users.id' , '=' , 'blogs.user_id')->select(
                'users.id as user_id',
                'users.name as user_name',
                'users.type as user_type',
                'blogs.id as blog_id', 
                'blogs.title',
                'blogs.time',
                'blogs.abstract',
                'blogs.article',
            )->where('blogs.id' , $id)->first(); 
        }
        return BlogModel::where ('id' , $id)->first(); 
    }
    public function edit(mixed $id):object|null
    {

    }
    public function create():array
    {

    }
    public function update(array $data , int $id):bool
    {
        $found = BlogModel::find($id); 
        return ($found)? $found->update($data) : false ; 
    }
    public function destroy(int $id):bool
    {
        $found = BlogModel::find($id); 
        return ($found)?$found->delete():false ; 
    }


} 