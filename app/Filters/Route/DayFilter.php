<?php
namespace App\Filters\Route;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class DayFilter extends FilterAbstract
{
    
    public function filter(Builder $builder, $value)
    {
        return $builder->whereDate('start_timestamp', $value);
    }
}