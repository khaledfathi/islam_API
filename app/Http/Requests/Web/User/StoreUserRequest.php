<?php

namespace App\Http\Requests\Web\User;

use App\Enum\UserType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreUserRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'phone'=>'nullable|numeric',
            'type'=>['required', new Enum(UserType::class)],
            'image'=>'nullable|mimes:jpg,jpge,bmp,png,tiff,webp,heif|max:10000'
        ];
    }
}
