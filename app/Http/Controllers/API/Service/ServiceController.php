<?php

namespace App\Http\Controllers\API\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Service\StoreServiceRequest;
use App\Http\Requests\API\Service\UpdateServiceRequest;
use App\Repository\Contract\ServiceRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public ServiceRepositoryContract $serviceProvider; 
    public function __construct(
        ServiceRepositoryContract $serviceProvider 
    ){
        $this->serviceProvider = $serviceProvider; 
    }
    public function index (Request $request)
    {
        return response()->json([
            'data'=>$this->serviceProvider->index(leftJoinUsers:true) 
        ]); 
    } 
    public function indexFilter(Request $request){
        $allowed = ['service_type', 'animal_type' , 'approval']; 
        if(in_array($request->column , $allowed)){
            return response()->json ([
                'data'=>$this->serviceProvider->index(filter:[$request->column=>$request->find] , leftJoinUsers:true) 
            ]);
        }
        return abort(404); 
    }
    public function store (StoreServiceRequest $request)
    {
        //preparing data to store 
        $data = [
            'user_id'=> $request->user_id,
            'name'=> $request->name,
            'phone'=> $request->phone,
            'address'=> $request->address,
            'working_hours'=> $request->working_hours,
            'description'=> $request->description,
            'service_type'=> $request->service_type,
            'animal_type'=> $request->animal_type,
            'approval'=> $request->approval,
        ]; 
        //store image file
        $file = $request->file('file'); 
        $data['image']=uploadeFile($file , 'service-image'); 
        
        //store record
        $record = $this->serviceProvider->store($data); 
        return response()->json([
            'record'=>$record,
            'msg'=>'service has been stored successfuly.',
            'status'=>true
        ]); 
    }
    public function show(Request $request)
    {
        $record = $this->serviceProvider->show($request->id , leftJoinUsers:true);
        if ($record){
            return response()->json([
                'status'=>true, 
                'data'=>$this->serviceProvider->show($request->id , leftJoinUsers:true),
            ]); 
        }
        return response()->json([
            'status'=>false, 
            'msg'=>'Service is not exist !',
            'data'=>[]
        ]); 

    }
    public function edit(Request $request)
    {
        $record = $this->serviceProvider->show($request->id , leftJoinUsers:true);
        if ($record){
            return response()->json([
                'status'=>true, 
                'data'=>$this->serviceProvider->show($request->id , leftJoinUsers:true),
            ]); 
        }
        return response()->json([
            'status'=>false, 
            'msg'=>'Service is not exist !',
            'data'=>[]
        ]); 
    }
    public function create()
    {
        return response()->json([
            'data'=>$this->serviceProvider->create()
        ]);
    }
    public function update(UpdateServiceRequest $request)
    {
     
        //prepearing data
        $data = (array)$request->all(); 
        $record =$this->serviceProvider->show($request->id); 
        if ($record){
            if ($request->has('file')){
                $file= $request->file('file'); 
                $data['image']=uploadeFile($file , 'service-image'); 
                //delete old file  
                ($record->image)?File::delete($record->image): null;
            }
            //update record
            $update = $this->serviceProvider->update($data , $request->id);
            if ($update){
                return response()->json([
                    'status'=>true,
                    'msg'=>"Service has been Updated .",
                ]);
            }
        }
        return response()->json([
            'status'=>false,
            'msg'=>'service is not exist .'
        ]);
    }

    public function destroy(Request $request)
    {
       if ($this->serviceProvider->destroy($request->id)){
            return response()->json([
                'status'=>true,
                'msg'=>'Service has been deleted successfuly .'
            ]); 
       }
            return response()->json([
                'status'=>false,
                'msg'=>'Service is not exist !',
            ]); 
    }
}
