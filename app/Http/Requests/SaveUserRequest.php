<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class SaveUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "first_name" =>  ['required', 'string'],
            "last_name" =>  ['required', 'string'],
            "phone_number" =>  ['required', 'string'],
            "picture" =>  ['nullable', 'sometimes', 'string'],
            "email" =>  ['required', 'email:rfc,dns', Rule::unique('users', 'email')],
            "company_contact" =>  ['sometimes', 'nullable', 'string'],
            "credits" =>  ['sometimes', 'nullable', 'float'],
        ];
    }

    public function validated($key = null, $default = null)
    {
        $validated = $this->validator->validated();

        Arr::set($validated, 'status', 1);
        Arr::set($validated, 'first', 0);
        Arr::set($validated, 'no_registered', 1);

        return $validated;
    }
}
