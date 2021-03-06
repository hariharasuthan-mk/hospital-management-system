<?php

namespace App\Http\Requests\University;

use Illuminate\Foundation\Http\FormRequest;

class FieldRequest extends FormRequest
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
        return [
            'name' => ['required','unique:university','min:5'],
            'author_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
        'name.required' => 'You have to choose University',
        'name.min'=> 'University Should be Minimum of 5 Character', // custom message
        'name.unique'=> 'The University has already been',
        ];
    }
}
