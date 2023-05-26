<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Date;

class SaveReservationRequest extends FormRequest
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
            'user_plan_id' => ['required', 'exists:App\Models\UserPlan,id'],
            'route_id' => ['required', 'exists:App\Models\Route,id'],
            "track_id" => ['sometimes', 'nullable', 'integer'],
            "reservation_start" =>  ['required', 'date', 'before_or_equal:reservation_end', 'after_or_equal:' . Date::now()->format('Y-m-d H:i:s')],
            "reservation_end" =>  ['required', 'date', 'after_or_equal:reservation_start', 'after_or_equal:' . Date::now()->format('Y-m-d H:i:s')],
            "route_stop_origin_id" => ['required', 'integer'],
            "route_stop_destination_id" => ['required', 'integer']
        ];
    }
}
