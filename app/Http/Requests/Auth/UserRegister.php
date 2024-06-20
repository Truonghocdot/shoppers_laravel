<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UserRegister extends FormRequest
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
            "username" => "min:6|max:255|required",
            "phone"=>"min:9|max:11|required",
            "email"=>"min:6|required|email|min:8|unique:users,email",
            "password"=>"min:6|required|confirmed"
        ];
    }
}
