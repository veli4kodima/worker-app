<?php

namespace App\Http\Filters\V1;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{

    private array $params = [];
    const TITLE = 'title';
    const VIEW = 'view';


    public function __construct(array $params)
    {
        $this->params = $params;
    }

    public function getCallbacks(): array
    {
        return [
            self::TITLE => 'title',
            self::VIEW => 'view',
        ];
    }

    public function applyFilter(Builder $builder)
    {
        foreach ($this->getCallbacks() as $key => $value) {
            if(isset($this->params[$key])) {
                $this->$value($builder, $this->params[$key]);
            }
        }
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }
    public function view(Builder $builder, $value)
    {
        $builder->where('view', 'like', "%{$value}%");
    }

}
