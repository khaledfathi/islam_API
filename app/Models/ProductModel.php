<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    public $table = 'products';  
    protected $fillable = [
        'name',
        'price',
        'description', 
        'category', 
        'image',
        'approval',
        'user_id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
