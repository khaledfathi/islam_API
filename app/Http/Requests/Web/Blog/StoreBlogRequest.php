<?php

namespace App\Http\Requests\Web\Blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'time' => 'required|date_format:Y-m-d\TH:i', 
            'title'=>'required', 
            'image'=>'required|mimes:jpg,jpge,bmp,png,tiff,webp,heif|max:10000',
        ];
    }
}
