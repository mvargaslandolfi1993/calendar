<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Date;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;

class UpdateCalendarDayDisabled extends FormRequest
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
            'calendar_id' => ['sometimes', 'exists:App\Models\Calendar,id'],
            'day' => ['sometimes', 'date', 'after_or_equal:' . Date::now()->format('Y-m-d'), Rule::unique('calendar_day_disableds')->where(function (Builder $query) {
                return $query->where('day', $this->request->get('day'));
            })],
            'enabled' => ['sometimes', 'boolean']
        ];
    }
}
