<?php

namespace App\Http\Controllers\Backup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackupController extends Controller
{
    public function index (){
        return view('backup.index'); 
    }
    public function exportDB (){
        return "export db";     
    }
    public function exportFiles(){
        return "files" ; 
    }
}
