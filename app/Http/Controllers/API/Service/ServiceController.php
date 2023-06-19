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
    public function index ()
    {
        return response()->json([
            'data'=>$this->serviceProvider->index(leftJoinUsers:true),
        ]); 
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
        return response()->json([
            'data'=>$this->serviceProvider->show($request->id , leftJoinUsers:true),
        ]); 
    }
    public function edit(Request $request)
    {
        return response()->json([
            'data'=>$this->serviceProvider->show($request->id , leftJoinUsers:true),
        ]); 
    }
    public function create()
    {
        return $this->serviceProvider->create(); 
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
