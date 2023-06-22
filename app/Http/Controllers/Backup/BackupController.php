<?php

namespace App\Http\Controllers\Backup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class BackupController extends Controller
{
    public function index (){
        return view('backup.index'); 
    }
    public function export (){
        //delete old backup 
        try{
            $backupDir = base_path('storage/app/public/Backup/');
            $files = scandir($backupDir , SCANDIR_SORT_DESCENDING );
            foreach($files as $file){
                ($file != '.' || $file != '..') && File::delete($backupDir.$file );
            }
        }catch (\Exception){}
        
        //create a backup 
        Artisan::call('backup:run');
        // dd(Artisan::output()); 
        
        //get the backup File  
        $files = scandir($backupDir , SCANDIR_SORT_DESCENDING);
        $newestFile =$files[0];

        //download the file 
        return response()->json(["link"=>asset('storage/Backup/'.$newestFile)]); 
    }
    public function import (Request $request){        
       return "dsa" ; 
    }
}
