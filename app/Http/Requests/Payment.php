<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Payment extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'c_fname'=>'bail|required',
            'c_lname'=>'bail|required',
            'c_province'=>'bail|required',
            'c_district'=>'bail|required',
            'c_ward'=>'bail|required',
            'c_email_address'=>'bail|required|email',
            'c_phone'=>'bail|min:9|max:11|required',
        ];
    }
}
