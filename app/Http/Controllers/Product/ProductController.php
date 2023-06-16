<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Repository\Contract\ProductRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public ProductRepositoryContract $productProvider ; 
    public function __construct(
        ProductRepositoryContract $productProvider
    )
    {
        $this->productProvider = $productProvider; 
    }
    public function index (){
        $products = $this->productProvider->index(); 
        return view('product.index',[
            'products'=>$products
        ]); 
    } 
    public function create()
    {
        return view('product.create'); 
    }
   public function store (Request $request)
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
        $file = $request->file('image'); 
        $data['image']=uploadeFile($file , 'product-image'); 
        
        //store record
        $record = $this->productProvider->store($data); 
        return  redirect(route('product.index'));
    }
    public function edit(mixed $id)
    {
        return "product Edit page"; 
    }
    public function update(array $data , int $id)
    {

    }
    public function destroy(Request $request)
    {
        $record = $this->productProvider->show($request->id); 
        if ($record){
            ($record->image)?File::delete($record->image):null;  
            $this->productProvider->destroy($request->id);
        }
        return back(); 
    }
}
