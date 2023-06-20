<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Blog\StoreBlogRequest;
use App\Http\Requests\Web\Blog\UpdateBlogRequest;
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
        $blogs =$this->blogProvider->index(true) ; 
        return view('blog.index', [
            'blogs'=>$blogs 
        ]);  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = $this->userProvider->index(); 
        return view('blog.create', [
            'users'=>$users, 
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
        $file = $request->file('image'); 
        $data['image']=uploadeFile($file , 'blog-image'); 
        
        //store record
        $record = $this->blogProvider->store($data); 
        return  redirect(route('blog.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $record = $this->blogProvider->show($request->id , true); 
        return view('blog.show' , [
            'record'=>$record 
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $users = $this->userProvider->index(); 
        $record = $this->blogProvider->show($request->id);  
        // dd($record); 
        return view('blog.edit' , [
            'users'=>$users , 
            'record' => $record
        ]); 

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request)
    {
        //prepearing data
        $data = (array) $request->except('_token');
        $record = $this->blogProvider->show($request->id);
        if ($record) {
            if ($request->has('image')) {
                $file = $request->file('image');
                $data['image'] = uploadeFile($file, 'blog-image');
                //delete old file  
                ($record->image) ? File::delete($record->image) : null;
            }
            //update record
            $update = $this->blogProvider->update($data, $request->id);
        }
        return redirect(route('blog.index')); 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
       $this->blogProvider->destroy($request->id);  
       return back(); 
    }
}
