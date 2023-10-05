<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreListingRequest extends FormRequest
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
        $regexNamesNumsBasicSymbols = "/^[a-zA-Zа-яА-Я0-9,.|\-_ ]+$/u";
        $regexText = "/^[a-zA-Zа-яА-Я0-9,.|\-_?!@#$%&*()+ ]+$/u";
        $regexCSV = "/(\w+)(,{0,1}\w+)/u";

        return [
            
            'company' => ['required', 'min:1', 'max:255', 'regex:' . $regexNamesNumsBasicSymbols],
            'title' => ['required', 'min:1', 'max:255', 'regex:' . $regexNamesNumsBasicSymbols], 
            'location' => ['required', 'min:1', 'max:255', 'regex:' . $regexText], 
            'website' => ['required', 'min:1', 'max:255'], 
            'email' => ['required', 'email', 'min:1', 'max:255'], 
            'tags' => ['required', 'min:1', 'max:255', 'regex:' . $regexCSV], 
            'description' => ['required', 'min:1', 'regex:' . $regexText]
                
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
    */

    public function messages()
    {
        return [
            'title.regex' => 'You must type only letters.',
            'company.regex' => 'You must type only letters.',
            'tags.regex' => 'Tags must be separated with no space.'

        ];
    }
}
