<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCalendarDayDisabledRequest;
use App\Http\Requests\UpdateCalendarDayDisabled;
use App\Http\Resources\CalendarDayDisabledResource;
use App\Models\CalendarDayDisabled;
use Illuminate\Http\Request;

class CalendarDaysDisabledController extends Controller
{
    /**
     * Store a newly created resource.
     *
     * @param  \App\Http\Requests\SaveCalendarDayDisabledRequest  $request
     * @return \App\Http\Resources\CalendarDayDisabledResource
     */
    public function store(SaveCalendarDayDisabledRequest $request): CalendarDayDisabledResource
    {
        $calendarDayDisabled = CalendarDayDisabled::create($request->validated());

        return new CalendarDayDisabledResource($calendarDayDisabled);
    }

    /**
     * Update the specified calendar day
     *
     * @param  \App\Http\Requests\UpdateCalendarDayDisabled  $request
     * @param  \App\Models\CalendarDayDisabled  $calendarDayDisabled
     * @return \App\Http\Resources\CalendarDayDisabledResource
     */
    public function update(UpdateCalendarDayDisabled $request, CalendarDayDisabled $calendarDayDisabled)
    {
        $calendarDayDisabled->update($request->validated());

        return new CalendarDayDisabledResource($calendarDayDisabled);
    }

    /**
     * Soft-Delete Calendar Day.
     *
     * @param  \App\Models\CalendarDayDisabled  $calendarDayDisabled
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalendarDayDisabled $calendarDayDisabled)
    {
        $calendarDayDisabled->delete();

        return response([
            'message' => 'The calendar availability has been deleted'
        ], 200);
    }
}
