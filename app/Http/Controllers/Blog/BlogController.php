<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Repository\Contract\BlogRepositoryContract;
use App\Repository\Contract\UserRepositoryContract;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $this->blogProvider->store((array)$request->except('_token')); 
        return redirect(route('blog.index')); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $record = $this->blogProvider->show($request->id); 
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
    public function update(Request $request)
    {
        $this->blogProvider->update((array)$request->except(['_token', 'id']) , $request->id);
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