<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class SaveServicesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'status_info' => json_encode($this->status_info),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "external_id" => ['required', 'string'],
            "external_budget_id" => ['required', 'string'],
            "external_route_id" => ['required', 'string'],
            "track_id" => ['sometimes', 'nullable', 'string'],
            "name" => ['required', 'string'],
            "notes" => ['nullable', 'sometimes', 'string'],
            "timestamp" => ['required', 'date'],
            "arrival_address" => ['required', 'string'],
            "arrival_timestamp" => ['required', 'date'],
            "departure_address" => ['required', 'string'],
            "departure_timestamp" => ['required', 'date'],
            "capacity" => ['required', 'integer'],
            "status" => ['required', 'numeric'],
            "status_info" => ['required', 'json'],
            "reprocess_status" => ['required', 'boolean'],
            "return" => ['required', 'boolean'],
            'province_id' => ['required', 'exists:App\Models\Province,id'],
            "notes_drivers" => ['sometimes', 'nullable', 'string'],
            "itinerary_drivers" => ['required', 'string'],
        ];
    }

    public function validated($key = null, $default = null)
    {
        $validated = $this->validator->validated();

        Arr::set($validated, 'confirmed_pax_count', 0);

        return $validated;
    }
}
