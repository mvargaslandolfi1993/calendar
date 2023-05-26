<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Date;
use Illuminate\Validation\Rule;

class SaveUserPlanRequest extends FormRequest
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
            'user_id' => ['required', 'exists:App\Models\User,id'],
            'currency_id' => ['required', 'exists:App\Models\Currency,id'],
            'next_user_plan_id' => ['sometimes', 'nullable', 'integer'],
            'start_timestamp' => ['sometimes', 'nullable', 'date'],
            'end_timestamp' => ['sometimes', 'nullable', 'date'],
            'renewal_timestamp' => ['sometimes', 'nullable', 'date'],
            'renewal_price' => ['required', 'numeric'],
            'requires_invoice' => ['required', 'boolean'],
            'status' => ['required', 'integer'],
            'financiation' => ['required', 'numeric'],
            'language' => ['required', 'string'],
            'nif' => ['nullable', 'sometimes', 'string'],
            'business_name' => ['nullable', 'sometimes', 'string'],
            'company_id' => ['required', 'exists:App\Models\Company,id']
        ];
    }

    public function validated($key = null, $default = null)
    {
        $validated = $this->validator->validated();

        Arr::set($validated, 'created', Date::now());
        Arr::set($validated, 'modified', Date::now());

        $isFinanciated = $validated['financiation'] > 0 ? true : false;
        Arr::set($validated, 'status_financiation', $isFinanciated);
        Arr::set($validated, 'pending_payment', $isFinanciated);


        return $validated;
    }
}
