<?php

namespace App\Http\Requests;

use App\DTOs\UserDTO;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = (new UserDTO)->rules();
        $rules['name'] = ['required', 'string', 'max:255'];
        return $rules;
    }
}
