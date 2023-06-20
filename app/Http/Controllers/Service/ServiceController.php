<?php

namespace App\Http\Controllers\Service;

use App\Enum\AnimalType;
use App\Enum\Approval;
use App\Enum\ServiceType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Service\StoreServiceRequest;
use App\Http\Requests\Web\Service\UpdateServiceRequest;
use App\Repository\Contract\ServiceRepositoryContract;
use App\Repository\Contract\UserRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $services = $this->serviceProvider->index(leftJoinUsers:true); 
        return view('service.index',[
            'services'=>$services
        ]); 
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
        $file = $request->file('image'); 
        $data['image']=uploadeFile($file , 'service-image'); 
        
        //store record
        $record = $this->serviceProvider->store($data); 
        return  redirect(route('service.index'));
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
        $approval = Approval::cases();
        return view('service.edit', [
            'record'=> $record, 
            'users'=>$users,
            'serviceTypes'=>$serviceTypes,
            'animalTypes'=>$animalTypes,
            'approval'=>$approval
        ]); 
    }
    public function create()
    {
        $users = $this->userProvider->index();
        $serviceTypes = ServiceType::cases(); 
        $animalTypes = Animaltype::cases(); 
        $approval = Approval::cases();
        return view('service.create',[
            'users'=>$users,
            'serviceTypes'=>$serviceTypes,
            'animalTypes'=>$animalTypes,
            'approval' => $approval
        ]); 
    }
    public function update(UpdateServiceRequest $request)
    {
        //prepearing data
        $data = (array) $request->except('_token');
        $record = $this->serviceProvider->show($request->id);
        if ($record) {
            if ($request->has('image')) {
                $file = $request->file('image');
                $data['image'] = uploadeFile($file, 'service-image');
                //delete old file  
                ($record->image) ? File::delete($record->image) : null;
            }
            //update record
            $update = $this->serviceProvider->update($data, $request->id);
        }
        return redirect(route('service.index')); 
    }
    public function destroy(Request $request)
    {
        $record = $this->serviceProvider->show($request->id); 
        if ($record){
            File::delete($record->image);
            $this->serviceProvider->destroy($request->id); 
        }
        return redirect(route('service.index')); 
    }

}
