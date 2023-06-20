<?php

namespace App\Http\Requests\API\Product;

use App\Enum\Approval;
use App\Enum\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Enum;

class UpdateProductRequest extends FormRequest
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
            'price'=>'sometimes|required|numeric', 
            'category'=>['sometimes' , new Enum(Category::class)], 
            'image'=>'sometimes|mimes:jpg,jpge,bmp,png,tiff,webp,heif|max:10000',
            'approval'=>['sometimes' , new Enum(Approval::class)],
            'user_id'=>'nullable|exists:users,id'

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
