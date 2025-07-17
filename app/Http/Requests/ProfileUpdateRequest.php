<?php

namespace App\Http\Requests;

use App\DTOs\UserDTO;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = (new UserDTO)->rules();
        $rules['name'] = ['required', 'string', 'max:255'];
        $rules['email'] = array_merge($rules['email'], ['lowercase', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)]);
        return $rules;
    }
}
