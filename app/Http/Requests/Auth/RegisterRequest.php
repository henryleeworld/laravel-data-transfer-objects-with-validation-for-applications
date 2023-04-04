<?php

namespace App\Http\Requests\Auth;

use App\DTOs\UserDTO;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = (new UserDTO)->rules();
        $rules['name'] = ['required', 'string', 'max:255'];
        $rules['email'] = array_merge($rules['email'], ['max:255', 'unique:'.User::class]);
        $rules['password'] = array_merge($rules['password'], ['confirmed']);
        return $rules;
    }
}
