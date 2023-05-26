<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_plan_id",
        "route_id",
        "track_id",
        "reservation_start",
        "reservation_end",
        "route_stop_origin_id",
        "route_stop_destination_id"
    ];

    public function route(): BelongsTo
    {
        return $this->belongsTo(Route::class);
    }

    public function user_plan(): BelongsTo
    {
        return $this->belongsTo(UserPlan::class);
    }
}
