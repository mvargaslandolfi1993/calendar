<?php

namespace App\Http\Controllers;

use App\Http\Resources\AvailabilityResource;
use App\Models\Route;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function __invoke(Request $request)
    {
        return AvailabilityResource::collection(
            Route::with(
                'route_frequency.calendar.calendars_day_disabled',
                'reservations',
                'services'
            )->filter($request->query())->paginate($request->get('limit', 25))
        );
    }
}
