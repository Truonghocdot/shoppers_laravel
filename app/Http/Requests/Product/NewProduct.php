<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class NewProduct extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>"bail|required|min:10",
            "description"=>"bail|required|min:20",
            "image"=>"required|mimes:jpg,png,jepg,gif,svg",
            "count"=>"required|min:1",
            "price"=>"required|min:6"
        ];
    }
}
