<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveRouteData;
use App\Http\Resources\RouteDataResource;
use App\Models\RouteFrequency;
use Illuminate\Http\Request;

class RouteDataController extends Controller
{
    /**
     * Display all collections.
     * @return \App\Http\Resources\RouteDataResource collection
     */
    public function index(Request $request)
    {
        return RouteDataResource::collection(
            RouteFrequency::paginate($request->get('limit', 25))->load(['route', 'calendar.calendars_day_disabled'])
        );
    }

    /**
     * Store a newly created resource.
     *
     * @param  \App\Http\Requests\SaveRouteData  $request
     * @return \App\Http\Resources\RouteDataResource
     */
    public function store(SaveRouteData $request): RouteDataResource
    {
        $routeFrequency = RouteFrequency::create($request->validated());

        return new RouteDataResource($routeFrequency);
    }

    /**
     * Update the specified model.
     *
     * @param  \App\Http\Requests\SaveRouteData  $request
     * @param  \App\Models\RouteFrequency  $route
     * @return \App\Http\Resources\RouteDataResource
     */
    public function update(RouteFrequency $routeFrequency, SaveRouteData $request): RouteDataResource
    {
        $routeFrequency->update($request->validated());

        return new RouteDataResource($routeFrequency);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RouteFrequency  $routeFrequency
     * @return \App\Http\Resources\RouteDataResource
     */
    public function show(RouteFrequency $routeFrequency)
    {
        $routeFrequency->load(['route', 'calendar.calendars_day_disabled']);
        return new RouteDataResource($routeFrequency);
    }

    /**
     * Soft-Delete model.
     *
     * @param  \App\Models\RouteFrequency  $routeFrequency
     * @return \Illuminate\Http\Response
     */
    public function destroy(RouteFrequency $routeFrequency)
    {
        $routeFrequency->delete();

        return response([
            'message' => 'The route data has been deleted'
        ], 200);
    }
}
