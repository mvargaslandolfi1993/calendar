<?php
namespace App\Filters\Route;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class RangeFilter extends FilterAbstract
{
    
    public function filter(Builder $builder, $value)
    {
        $fechas = explode('/', $value);
        
        return $builder->whereBetween('start_timestamp', [$fechas[0], $fechas[1]]);
    }
}