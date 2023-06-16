<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data'=> ProductModel::get() 
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
                'price' => 'required , integer only ',
                'description'=>'optional ', 
                'category' => "required , accept these value ['food' ,'toys','accessories','beds','grooming']",
                'image'=> 'required , accepted type [jpg,jpge,bmp,png,tiff,webp,heif] , max size: 10000 KB ',
                'user_id' => 'optional , file '
            ]
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //preparing data to store 
        $data = [
            'name'=>$request->name, 
            'price'=>$request->price,
            'description'=>$request->description,
            'category'=>$request->category,
            'user_id' =>$request->user_id,
        ]; 
        //store image file
        if ($request->has('file')){
            $file = $request->file('file'); 
            $data['image']=uploadeFile($file , 'product-image'); 
        }

        $record = ProductModel::create($data); 
        return response()->json([
            'status'=>true,
            'msg'=>"Product has been stored .",
            'record'=>$record
        ]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $found =  ProductModel::find($request->id); 
        if ($found){
            return response()->json([
                'status'=>true,
                'data'=>$found
            ]); 
        }
        return response()->json([
            'status'=>false,
            'msg'=>'product is not exist !',
            'data'=>[]
        ]); 

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $found =  ProductModel::find($request->id); 
        if ($found){
            return response()->json([
                'status'=>true,
                'data'=>$found
            ]); 
        }
        return response()->json([
            'status'=>false,
            'msg'=>'product is not exist !',
            'data'=>[]
        ]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //prepearing data
        $data = (array)$request->all(); 
        $found = ProductModel::find($request->id);
        if ($found){
            if ($request->has('file')){
                $file= $request->file('file'); 
                $data['image']=uploadeFile($file , 'product-image'); 
                //delete old file  
                ($found->image)?Storage::delete($found->image): null;
            }
            //update record
            $update = $found->update($data);
            if ($update){
                return response()->json([
                    'status'=>true,
                    'msg'=>'Product has been updated .'
                ]);
            }else {
                 return response()->json([
                    'status'=>false,
                    'msg'=>'Validation error', 
                ]);
               
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $found = ProductModel::find($request->id); 
        if ($found){
            return response()->json([
                'status'=>true, 
                'msg'=>'Product has been deleted successfuly.'
            ]); 
        }
        return response()->json([
            'status'=>false,
            'msg'=>'product is not exist !',
        ]); 

    }
}
