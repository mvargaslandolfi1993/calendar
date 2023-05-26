<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCalendarRequest;
use App\Http\Resources\CalendarResource;
use App\Models\Calendar;
use App\Models\Route;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of calendars.
     * @return \App\Http\Resources\CalendarResource collection
     */
    public function index(Request $request)
    {
        return CalendarResource::collection(
            Calendar::paginate($request->get('limit', 25))->load(['calendars_day_disabled'])
        );
    }

    /**
     * Store a newly created resource.
     *
     * @param  \App\Http\Requests\SaveCalendarRequest  $request
     * @return \App\Http\Resources\CalendarResponse
     */
    public function store(SaveCalendarRequest $request): CalendarResource
    {
        $calendar = Calendar::create($request->validated());

        return new CalendarResource($calendar);
    }

    /**
     * Update the specified calendar.
     *
     * @param  \App\Http\Requests\SaveCalendarRequest  $request
     * @param  \App\Models\Calendar  $calendar
     * @return \App\Http\Resources\CalendarResources
     */
    public function update(Calendar $calendar, SaveCalendarRequest $request): CalendarResource
    {
        $calendar->update($request->validated());

        return new CalendarResource($calendar);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \App\Http\Resources\CalendarResource
     */
    public function show(Calendar $calendar)
    {
        return new CalendarResource($calendar->load('calendars_day_disabled'));
    }

    /**
     * Soft-Delete the specified calendar.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calendar $calendar)
    {
        $calendar->delete();

        return response([
            'message' => 'The calendar has been deleted'
        ], 200);
    }
}
