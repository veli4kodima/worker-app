<?php

namespace App\Http\Filters\V1;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter
{

    private array $params = [];

    public function __construct(array $params)
    {
        $this->params = $params;
    }

    public function applyFilter(Builder $builder)
    {
        foreach ($this->getCallbacks() as $key => $value) {
            if(isset($this->params[$key])) {
                $this->$value($builder, $this->params[$key]);
            }
        }
    }

    abstract public function getCallbacks();

}
