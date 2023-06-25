<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Product\StoreProductRequest;
use App\Http\Requests\API\Product\UpdateProductRequest;
use App\Models\ProductModel;
use App\Repository\Contract\ProductRepositoryContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public ProductRepositoryContract $productProvider; 
    public function __construct(
        ProductRepositoryContract $productProvider
    )
    {
       $this->productProvider = $productProvider; 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data'=> $this->productProvider->index() 
        ]); 
    }

    public function indexFilter(Request $request){
        $allowed = ['category', 'approval']; 
        if(in_array($request->column , $allowed)){
            return response()->json ([
                'data'=>$this->productProvider->index(filter:[$request->column => $request->find] ) 
            ]);
        }
        return abort(404); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'data'=>$this->productProvider->create()
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //preparing data to store 
        $data = [
            'name'=>$request->name, 
            'price'=>$request->price,
            'description'=>$request->description,
            'category'=>$request->category,
            'approval'=>$request->approval,
            'user_id' =>$request->user_id,
        ]; 
        //store image file
        if ($request->has('file')){
            $file = $request->file('file'); 
            $data['image']=uploadeFile($file , 'product-image'); 
        }

        $record = $this->productProvider->store($data); 
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
        $found = $this->productProvider->show($request->id); 
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
        $found = $this->productProvider->show($request->id); 
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
    public function update(UpdateProductRequest $request)
    {
        //prepearing data
        $data = (array)$request->except('user_id'); 
        // $data = (array)$request->all(); 
        $record =$this->productProvider->show($request->id); 
        if ($record){
            if ($request->has('file')){
                $file= $request->file('file'); 
                $data['image']=uploadeFile($file , 'product-image'); 
                //delete old file  
                ($record->image)?File::delete($record->image): null;
            }
            //update record
            $update = $this->productProvider->update($data , $request->id);
            if ($update){
                return response()->json([
                    'status'=>true,
                    'msg'=>'Product has been updated .'
                ]);
            }
        }
            return response()->json([
                'status'=>false,
                'msg'=>'Product is not exist .'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $found = $this->productProvider->show($request->id); 
        if ($found){
            ($found->image)?File::delete($found->image):null;  
            $this->productProvider->destroy($request->id);
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
