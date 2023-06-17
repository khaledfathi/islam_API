<?php

namespace App\Http\Controllers\Product;

use App\Enum\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Product\StoreProductRequest;
use App\Http\Requests\Web\Product\UpdateProductRequest;
use App\Repository\Contract\ProductRepositoryContract;
use App\Repository\Contract\UserRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public ProductRepositoryContract $productProvider ; 
    public UserRepositoryContract $userProvider ; 
    public function __construct(
        ProductRepositoryContract $productProvider, 
        UserRepositoryContract $userProvider
    )
    {
        $this->productProvider = $productProvider; 
        $this->userProvider = $userProvider ; 
    }
    public function index (){
        $products = $this->productProvider->index(leftJoinUsers:true); 
        // dd($products); 
        return view('product.index',[
            'products'=>$products
        ]); 
    } 
    public function create()
    {
        $users = $this->userProvider->index(); 
        $categories = Category::cases(); 
        return view('product.create' , [
            'users'=> $users ,
            'categories'=>$categories
        ]); 
    }
   public function store (StoreProductRequest $request)
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
    public function edit(Request $request)
    {
        $record = $this->productProvider->show($request->id); 
        $users= $this->userProvider->index();
        $categories = Category::cases(); 
        return view('product.edit',[
            'record'=>$record,
            'users'=>$users,
            'categories'=>$categories, 
        ]); 
    }
    public function update(UpdateProductRequest $request)
    {
        //prepearing data
        $data = (array) $request->except('_token');
        $record = $this->productProvider->show($request->id);
        if ($record) {
            if ($request->has('image')) {
                $file = $request->file('image');
                $data['image'] = uploadeFile($file, 'product-image');
                //delete old file  
                ($record->image) ? File::delete($record->image) : null;
            }
            //update record
            $update = $this->productProvider->update($data, $request->id);
        }
        return redirect(route('product.index')); 
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
