<?php

namespace App\Http\Requests\Web\Product;

use App\Enum\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreProductRequest extends FormRequest
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
            'price'=>'required|numeric', 
            'category'=>['required' , new Enum(Category::class)], 
            'image'=>'required|mimes:jpg,jpge,bmp,png,tiff,webp,heif|max:10000',
            'user_id'=>'nullable|exists:users,id'
        ];
    }
}
