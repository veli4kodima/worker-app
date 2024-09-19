<?php

namespace App\Models\Traits;

use App\Http\Filters\V1\AbstractFilter;
use PhpParser\Builder;

trait HasFilter
{
    public function scopeFilter($query, AbstractFilter $filter)
    {
        $filter->applyFilter($query);
        return $query;
    }
}
