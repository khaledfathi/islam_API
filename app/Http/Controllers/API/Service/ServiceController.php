<?php

namespace App\Http\Controllers\API\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Service\StoreServiceRequest;
use App\Http\Requests\API\Service\UpdateServiceRequest;
use App\Repository\Contract\ServiceRepositoryContract;
use Illuminate\Http\Request;

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
        $allowed = ['service_type', 'animal_type']; 
        if(in_array($request->column , $allowed)){
            return response()->json ([
                'data'=>$this->serviceProvider->index(filter:[$request->column=>$request->type] , leftJoinUsers:true) 
            ]);
        }
        return abort(404); 
    }
    public function store (StoreServiceRequest $request)
    {
        return response()->json([
            'data'=>$this->serviceProvider->store((array)$request->all()),
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
        $update = $this->serviceProvider->update((array)$request->all() , $request->id); 
        if ($update)
        {
            return response()->json([
                'status'=>true,
                'msg'=>"Service has been Updated .",
            ]);
        } 
        return response()->json([
            'status'=>false,
            'msg'=>"Service is not exist !",
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
