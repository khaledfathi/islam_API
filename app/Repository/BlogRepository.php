<?php 
namespace App\Repository;
use App\Models\BlogModel;
use App\Repository\Contract\BlogRepositoryContract; 

class BlogRepository implements BlogRepositoryContract {
    public function index (bool $leftJoinUsers=false , $api=false):object 
    {
        if ($leftJoinUsers && !$api){
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
        }else if ($api){
             return BlogModel::leftJoin('users' , 'users.id' , '=' , 'blogs.user_id')->select(
                'users.id as user_id',
                'users.name as autor',
                'blogs.id', 
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
    public function show(mixed $id , $leftJonUsers=false , $api=false):object|null 
    {
        if ($leftJonUsers && !$api){
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
        }elseif($api){
            return BlogModel::leftJoin('users' , 'users.id' , '=' , 'blogs.user_id')->select(
                'users.id as user_id',
                'users.name as author',
                'blogs.id as id', 
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
        return [
            'user_id' => 'nullable ', 
            'time' => 'required | stander datetime format ISO8601 | same as this ( yyyy-mm-ddTxx:xx )', 
            'title'=>'required ',
            'abstract'=>'nullable ',
            'article'=>'nullable '
        ]; 

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