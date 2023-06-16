<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index ()
    {
        return view('product.index'); 
    } 
    public function store (array $data)
    {

    }
    public function show(mixed $id)
    {

    }
    public function edit(mixed $id)
    {
        
    }
    public function create()
    {

    }
    public function update(array $data , int $id)
    {

    }
    public function destroy(int $id)
    {

    }
}
