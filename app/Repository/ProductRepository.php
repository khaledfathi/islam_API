<?php 
namespace App\Repository;
use App\Models\ProductModel;
use App\Repository\Contract\ProductRepositoryContract; 

class ProductRepository implements ProductRepositoryContract{
    public function index (bool $leftJoinUsers=false ):object 
    {
        if ($leftJoinUsers){
            return ProductModel::leftJoin('users' , 'users.id' , '=' , 'products.user_id')->select(
                'products.id as product_id',
                'products.name as product_name',
                'products.price',
                'products.category',
                'products.description',
                'products.image as product_image',
                'users.id as user_id',
                'users.name as user_name',
                'users.email',
                'users.type as user_type',
                'users.phone',
                'users.image as user_image',
            )->get(); 
        }
        return ProductModel::get(); 
    }
    public function store (array $data ):object 
    {
        return ProductModel::create($data); 
    } 
    public function create():array
    {
        return [
            'name'=>'required ',
            'price' => 'required , integer only ',
            'description'=>'optional ', 
            'category' => "required , accept these value ['food' ,'toys','accessories','beds','grooming']",
            'file'=> 'required , accepted type [jpg,jpge,bmp,png,tiff,webp,heif] , max size: 10000 KB ',
            'user_id' => 'nullable '
        ]; 
    }
public function show(mixed $id):object | null
    {
        return ProductModel::where('id', $id)->first(); 
    }
    public function edit(mixed $id):object | null
    {
        return ProductModel::where('id', $id)->first(); 
    } 
    public function update(array $data , int $id):bool
    {
        $found = ProductModel::find($id); 
        return ($found)? $found->update($data):false; 
    }
    public function destroy(int $id):bool
    {
        $found = ProductModel::find($id); 
        return ($found) ? $found->delete(): false ; 
    }
}