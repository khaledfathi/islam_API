<?php

namespace App\Http\Requests\API\Service;

use App\Enum\AnimalType;
use App\Enum\Approval;
use App\Enum\ServiceType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Enum;

class StoreServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id'=>'nullable|exists:users,id',
            'name'=>'required',
            'phone'=>'required|numeric',
            'address'=>'required',
            'working_hours'=>'required',
            'description'=>'nullable',
            'service_type'=>['required' , new Enum(ServiceType::class)],
            'animal_type'=>['required' , new Enum(AnimalType::class)],
            'approval'=>[new Enum(Approval::class)], 
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'msg'=>'one or more fileds is invalid !',
            'errors' => $validator->errors()->all(),
        ], 200));
    }

}
