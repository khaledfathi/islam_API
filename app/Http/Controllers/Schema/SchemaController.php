<?php

namespace App\Http\Controllers\Schema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchemaController extends Controller
{
    public function index (){
        return view('schema.index');
    }
}
