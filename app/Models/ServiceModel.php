<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceModel extends Model
{
    use HasFactory;
    public $table = 'services'; 
    protected $fillable = [
        'name', 
        'phone',
        'address',
        'working_hours',
        'description',
        'image',
        'service_type',
        'animal_type',
        'approval',
        'user_id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
