<?php

namespace App\Http\Controllers\API\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Blog\StoreBlogRequest;
use App\Http\Requests\API\Blog\UpdateBlogRequest;
use App\Repository\Contract\BlogRepositoryContract;
use App\Repository\Contract\UserRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public BlogRepositoryContract $blogProvider; 
    public UserRepositoryContract $userProvider;
    public function __construct(
        BlogRepositoryContract $blogProvider , 
        UserRepositoryContract $userProvider
    ){
        $this->blogProvider = $blogProvider; 
        $this->userProvider = $userProvider; 
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return response()->json([
            'data'=>$this->blogProvider->index(api:true),
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'data'=>$this->blogProvider->create() 
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        //preparing data to store 
        $data = [
            'user_id'=>$request->user_id, 
            'time'=>$request->time,
            'title'=>$request->title,
            'abstract'=>$request->abstract,
            'article'=>$request->article,
        ]; 
        //store image file
        $file = $request->file('file'); 
        $data['image']=uploadeFile($file , 'blog-image'); 
        
        //store record
        $record = $this->blogProvider->store($data); 
        return response()->json([
            'record'=>$record,
            'msg'=>"Blog has been stored successfuly.",
            'status'=>true
        ]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $found = $this->blogProvider->show($request->id , api:true); 
        if ($found){
            return response()->json([
                'status'=>true,
                'data'=>$found,
            ]); 
        }
        return response()->json([
            'status'=>false,
            'msg'=>'Blog is not exist !',
            'data'=>[],
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $found = $this->blogProvider->show($request->id , api:true); 
        if ($found){
            return response()->json([
                'status'=>true,
                'data'=>$found,
            ]); 
        }
        return response()->json([
            'status'=>false,
            'msg'=>'Blog is not exist !',
            'data'=>[],
        ]); 
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request)
    {
        //prepearing data
        $data = (array)$request->all(); 
        $record =$this->blogProvider->show($request->id); 
        if ($record){
            if ($request->has('file')){
                $file= $request->file('file'); 
                $data['image']=uploadeFile($file , 'blog-image'); 
                //delete old file  
                ($record->image)?File::delete($record->image): null;
            }
            //update record
            $update = $this->blogProvider->update($data , $request->id);
            if ($update){
                return response()->json([
                    'status'=>true,
                    'msg'=>" Post has been Updated .",
                ]);
            }
        }
        return response()->json([
            'status'=>false,
            'msg'=>'service is not exist .'
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
       if ($this->blogProvider->destroy($request->id)){
            return response()->json([
                'status'=>true,
                'msg'=>'Post has been deleted successfuly .'
            ]); 
       }
            return response()->json([
                'status'=>false,
                'msg'=>'Post is not exist !',
            ]); 
    }
}
