<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'This field cannot be left blank',
            'name.min' => 'The name field must be at least 3 characters long',
            'email.email' => 'Email invalidate'
        ];
    }
}
