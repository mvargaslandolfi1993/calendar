<?php

use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CalendarDaysDisabledController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\RouteDataController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPlanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('calendars', CalendarController::class);

Route::apiResource('calendars/calendar-day-disabled', CalendarDaysDisabledController::class)->except([
    'index', 'show'
]);

Route::apiResource('routes', RouteController::class);
Route::apiResource('route-frequency', RouteDataController::class);
Route::apiResource('reservations', ReservationController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('services', ServicesController::class);
Route::post('user-plan/{user}', UserPlanController::class);

Route::get('availability', AvailabilityController::class);
