<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class AvailabilityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = array_merge(parent::toArray($request), [
            'frequency' => new RouteDataResource($this->whenLoaded('route_frequency')),
            'calendar' => new CalendarResource($this->whenLoaded('calendar')),
            'calendars_day_disabled' => new CalendarDayDisabledResource($this->whenLoaded('calendars_day_disabled')),
            'reservations' => new ReservationResource($this->whenLoaded('reservations')),
            'services' => new ServicesResource($this->whenLoaded('services')),
        ]);

        $calendar = Arr::get($data, 'frequency.calendar');

        $days_disabled = Arr::get($calendar, 'calendars_day_disabled');

        Arr::forget($data, 'frequency.calendar');

        Arr::forget($calendar, 'calendars_day_disabled');

        $filtered = Arr::where($days_disabled->toArray(), function ($value) {
            return $value['enabled'] === 0;
        });

        Arr::set($data, 'days_disabled', $filtered);
        Arr::set($data, 'calendar', $calendar);

        return Arr::except($data, ['created_at', 'route_frequency', 'updated_at', 'deleted_at', 'route_frequency.calendar.calendars_day_disabled']);
    }
}
