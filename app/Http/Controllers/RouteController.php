<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveRouteRequest;
use App\Http\Resources\RouteResource;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display all collections.
     * @return \App\Http\Resources\RouteResource collection
     */
    public function index(Request $request)
    {
        return RouteResource::collection(
            Route::paginate($request->get('limit', 25))->load('route_frequency', 'reservations')
        );
    }

    /**
     * Store a newly created resource.
     *
     * @param  \App\Http\Requests\SaveRouteRequest  $request
     * @return \App\Http\Resources\RouteResource
     */
    public function store(SaveRouteRequest $request): RouteResource
    {
        $route = Route::create($request->validated());

        return new RouteResource($route);
    }

    /**
     * Update the specified model.
     *
     * @param  \App\Http\Requests\SaveRouteRequest  $request
     * @param  \App\Models\Route  $route
     * @return \App\Http\Resources\RouteResource
     */
    public function update(Route $route, SaveRouteRequest $request): RouteResource
    {
        $route->update($request->validated());

        return new RouteResource($route);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Route  $route
     * @return \App\Http\Resources\RouteResource
     */
    public function show(Route $route)
    {
        return new RouteResource($route->load('route_frequency', 'reservations'));
    }

    /**
     * Soft-Delete model.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route)
    {
        $route->delete();

        return response([
            'message' => 'The route has been deleted'
        ], 200);
    }
}
