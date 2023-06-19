<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    use HasFactory;
    public $table = 'blogs'; 
    protected $fillable = [
        'time', 
        'title', 
        'abstract', 
        'article', 
        'user_id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
