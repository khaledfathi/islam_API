<?php

namespace App\Http\Requests\Web\Service;

use App\Enum\AnimalType;
use App\Enum\Approval;
use App\Enum\ServiceType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateServiceRequest extends FormRequest
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
            'name'=>'sometimes|required',
            'phone'=>'sometimes|required|numeric',
            'address'=>'sometimes|required',
            'working_hours'=>'sometimes|required',
            'description'=>'nullable',
            'image'=>'sometimes|required|mimes:jpg,jpge,bmp,png,tiff,webp,heif|max:10000',
            'service_type'=>['sometimes' , 'required' , new Enum(ServiceType::class)],
            'animal_type'=>[ new Enum(AnimalType::class)],
            'approval'=>[new Enum(Approval::class)], 
        ];
    }
}
