<?php
namespace App\Repository;
use App\Models\ServiceModel;
use App\Repository\Contract\ServiceRepositoryContract;

class ServiceRepository implements ServiceRepositoryContract{
    public function index (bool $leftJoinUsers=false):object 
    {
        if($leftJoinUsers){
            return ServiceModel::leftJoin('users' , 'users.id' , '=' , 'services.user_id')->select(
                'users.id as user_id', 
                'users.name as user_name', 
                'users.type as user_type',
                'services.id',
                'services.name',
                'services.phone',
                'services.address',
                'services.working_hours',
                'services.description',
                'services.service_type',
                'services.animal_type'
            )->get(); 
        }
        return ServiceModel::get(); 
    }
    public function store (array $data):object 
    {
        return ServiceModel::create($data); 
    }
    public function show(mixed $id):object|null
    {
        return ServiceModel::where('id' , $id)->first(); 
    }
    public function edit(mixed $id):object|null
    {
        return ServiceModel::where('id' , $id)->first(); 
    }
    public function create():array
    {
        return [
            'user_id'=> 'nullable , required', 
            'name' => 'required ', 
            'phone' => 'required',
            'address' => 'required', 
            'working_hours' => 'required',
            'description' => 'optional',
            'service_type' => 'required , accept these values only [clinics , shelter]',
            'animal_type' => 'nullable , accept these values only [cat , dog]'
        ]; 
    }
    public function update(array $data , int $id):bool
    {
        $found = ServiceModel::find($id);
        return ($found) ? $found->update($data) : false; 
    }
    public function destroy(int $id):bool
    {
        $found = ServiceModel::find($id);
        return ($found) ? $found->delete() : false; 
    }
}