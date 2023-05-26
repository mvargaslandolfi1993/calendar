<?php

namespace App\Models;

use App\Filters\Route\DayFilter;
use App\Filters\Route\RangeFilter;
use App\Filters\Route\RouteFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected $fillable = [
        'external_id',
        'invitation_code',
        'title',
        'start_timestamp',
        'end_timestamp',
    ];

    /**
     * Route frequency relation
     */
    public function route_frequency(): HasOne
    {
        return $this->hasOne(RouteFrequency::class);
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class, 'external_route_id', 'external_id');
    }

    /**
     * Return the filters that should be use by default
     *
     * @return array
     */
    public function filters(): array
    {
        return  [
            'day' => DayFilter::class,
            'range' => RangeFilter::class,
            'route_id' => RouteFilter::class,
        ];
    }
}
