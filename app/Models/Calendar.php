<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calendar extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    /**
     * Get the calendar days disabled relation
     */
    public function calendars_day_disabled(): HasMany
    {
        return $this->hasMany(CalendarDayDisabled::class);
    }

    /**
     * Get routes frequency relation
     */
    public function routes_frequency(): HasMany
    {
        return $this->hasMany(RouteFrequency::class);
    }
}   
