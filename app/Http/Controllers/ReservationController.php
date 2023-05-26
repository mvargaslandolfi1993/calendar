<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display all collections.
     * @return \App\Http\Resources\ReservationResource collection
     */
    public function index(Request $request)
    {
        return ReservationResource::collection(
            Reservation::paginate($request->get('limit', 25))->load('route', 'user_plan')
        );
    }

    /**
     * Store a newly created resource.
     *
     * @param  \App\Http\Requests\SaveReservationRequest  $request
     * @return \App\Http\Resources\ReservationResource
     */
    public function store(SaveReservationRequest $request): ReservationResource
    {
        $reservation = Reservation::create($request->validated());

        return new ReservationResource($reservation);
    }

    /**
     * Update the specified model.
     *
     * @param  \App\Http\Requests\SaveReservationRequest  $request
     * @param  \App\Models\Reservation 
     * @return \App\Http\Resources\ReservationResource
     */
    public function update(Reservation $reservation, SaveReservationRequest $request): ReservationResource
    {
        $reservation->update($request->validated());

        return new ReservationResource($reservation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation
     * @return \App\Http\Resources\ReservationResource
     */
    public function show(Reservation $reservation)
    {
        return new ReservationResource($reservation->load('route', 'user_plan'));
    }

    /**
     * Soft-Delete model.
     *
     * @param  \App\Models\Reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return response([
            'message' => 'The reservation has been deleted'
        ], 200);
    }   
}
