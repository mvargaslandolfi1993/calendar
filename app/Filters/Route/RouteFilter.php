<?php
namespace App\Filters\Route;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class RouteFilter extends FilterAbstract
{
    
    public function filter(Builder $builder, $value)
    {
        return $builder->where('id', $value);
    }
}