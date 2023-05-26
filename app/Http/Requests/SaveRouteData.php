<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Date;

class SaveRouteData extends FormRequest
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
            'route_id' => ['required', 'exists:App\Models\Route,id'],
            'calendar_id' => ['required', 'exists:App\Models\Calendar,id'],
            "vinculation_route" => ['nullable', 'integer'],
            "route_circular"    => ['required', 'boolean'],
            "date_init" =>  ['required', 'date', 'before_or_equal:date_finish', 'after_or_equal:' . Date::now()->format('Y-m-d H:i:s')],
            "date_finish" =>  ['required', 'date', 'after_or_equal:date_init', 'after_or_equal:' . Date::now()->format('Y-m-d H:i:s')],
            "mon" => ['required', 'boolean'],
            "tue" => ['required', 'boolean'],
            "wed" => ['required', 'boolean'],
            "thu" => ['required', 'boolean'],
            "fri" => ['required', 'boolean'],
            "sat" => ['required', 'boolean'],
            "sun" => ['required', 'boolean'],
        ];
    }
}
