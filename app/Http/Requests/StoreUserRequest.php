<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $regexText = "/^[a-zA-Zа-яА-Я0-9,.|\-_?!@#$%&*()+ ]+$/u";

        return [
            
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'min:1', 'max:255', Rule::unique('users', 'email')], 
            'password' => 'required|confirmed|min:6|max:255', 
            //'company_id' => [Rule::unique('companies', 'name')] it should be name but how to differentiate which column to choose?
                
        ];
    }

}
