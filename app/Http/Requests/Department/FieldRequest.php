<?php

namespace App\Http\Requests\Department;

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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,',
            'password' => 'same:confirm-password',
            'roles' => 'required',
            'organizations' => 'required',
        ];
    }

    public function messages()
    {
        return [
        'name.required' => 'Name is required',
        'email.required'  => 'An Email is required',
        'email.unique'  => 'An Email is already taken',
        'password.required'  => 'The password is required and are not same',       
        'roles.required'  => 'The role is required',
        'organizations.required'  => 'The organizations is required',
        ];
    }
}
