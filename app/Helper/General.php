<?php
/**
 * handle upload files
 * @param object $file file from request - (request->file('filename'))
 * @param string $path path to store file , it located under [ /storage/ forlder ]  
 * @return string file stored path 
 */
function uploadeFile(object $file , string $path ):string 
{
    $path = trim($path , '/'); 
    $fileName = rand(100,999).'_'.time().'.'.$file->extension() ;
    $file->storeAs($path , $fileName); 
    $filePath = 'storage/'.$path.'/'.$fileName;
    return $filePath; 
}
function isAdmin (string $email ){
    if ($email == ADMIN_EMAIL){
        return true ; 
    }
    return false; 
}