<?php

namespace App\Http\Requests\Web\User;

use App\Enum\UserType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateUserRequest extends FormRequest
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
            'name'=>'sometimes|required',
            'email'=>['sometimes' , 'required' ,'email','unique:users,email,'.$this->id],
            'password'=>'sometimes',
            'phone'=>'sometimes',
            'type'=>['sometimes' , 'required', new Enum(UserType::class)],
        ];
    }
}
