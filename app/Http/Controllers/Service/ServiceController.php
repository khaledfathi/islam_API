<?php

namespace App\Http\Controllers\Service;

use App\Enum\AnimalType;
use App\Enum\ServiceType;
use App\Http\Controllers\Controller;
use App\Repository\Contract\ServiceRepositoryContract;
use App\Repository\Contract\UserRepositoryContract;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public ServiceRepositoryContract $serviceProvider ;
    public UserRepositoryContract $userProvider ;
    public function __construct(
        ServiceRepositoryContract $serviceProvider, 
        UserRepositoryContract $userProvider
    ){
        $this->serviceProvider = $serviceProvider; 
        $this->userProvider = $userProvider;
    } 
    public function index ()
    {
        $services = $this->serviceProvider->index(); 
        return view('service.index',[
            'services'=>$services
        ]); 
    } 
    public function store (Request $request)
    {
        $this->serviceProvider->store((array)$request->except('_token'));
        return redirect(route('service.index')); 
    }
    public function show(Request $request)
    {
        //
    }
    public function edit(Request $request)
    {
        $record = $this->serviceProvider->show($request->id); 
        $users = $this->userProvider->index();
        $serviceTypes = ServiceType::cases(); 
        $animalTypes = Animaltype::cases(); 
        return view('service.edit', [
            'record'=> $record, 
            'users'=>$users,
            'serviceTypes'=>$serviceTypes,
            'animalTypes'=>$animalTypes
        ]); 
    }
    public function create()
    {
        $users = $this->userProvider->index();
        $serviceTypes = ServiceType::cases(); 
        $animalTypes = Animaltype::cases(); 
        return view('service.create',[
            'users'=>$users,
            'serviceTypes'=>$serviceTypes,
            'animalTypes'=>$animalTypes
        ]); 
    }
    public function update(Request $request)
    {
        $this->serviceProvider->update($request->except('_token'), $request->id); 
        return redirect(route('service.index')); 
    }
    public function destroy(Request $request)
    {
        $this->serviceProvider->destroy($request->id); 
        return back(); 
    }

}
