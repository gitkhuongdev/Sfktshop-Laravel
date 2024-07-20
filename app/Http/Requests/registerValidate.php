<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerValidate extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2',
            'email' => 'required|email|unique:users,email|regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/i',
            'password_1' => [
                'required',
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
            ],
            'password_2' => 'required|same:password_1',
            'phone' => 'required|digits:10',
            'address' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.min' => 'The name must be at least 2 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'This email is already registered.',
            'email.regex' => 'The email must be a valid Gmail address.',
            'password_1.required' => 'The password field is required.',
            'password_1.min' => 'The password must be at least 6 characters.',
            'password_1.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, and one number.',
            'password_2.required' => 'The password confirmation field is required.',
            'password_2.same' => 'The password confirmation does not match.',
            'phone.required' => 'The phone field is required.',
            'phone.digits' => 'The phone number must be 10 digits.',
            'address.required' => 'The address field is required.',
        ];
    }
}