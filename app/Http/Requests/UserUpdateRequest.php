<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'nullable|string|max:255',
            'surname' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255|unique:users,username',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'username.unique' => 'Username is already taken!',
            'email.unique' => 'Email is already taken!',
        ];
    }
}
