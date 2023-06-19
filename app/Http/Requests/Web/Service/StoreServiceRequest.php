<?php

namespace App\Http\Requests\Web\Service;

use App\Enum\AnimalType;
use App\Enum\ServiceType;
use Illuminate\Foundation\Http\FormRequest;
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
        ];
    }
}
