<?php

namespace App\Http\Filters\V1;

use Illuminate\Database\Eloquent\Builder;

class WorkerFilter extends AbstractFilter
{

    private array $params = [];
    const NAME = 'name';
    const SURNAME = 'surname';
    const EMAIL = 'email';
    const AGE = 'age';
    const IS_MARRIED = 'is_married';

    public function __construct(array $params)
    {
        $this->params = $params;
    }

    public function getCallbacks(): array
    {
        return [
            self::NAME => 'name',
            self::SURNAME => 'surname',
            self::EMAIL => 'email',
            self::AGE => 'age',
            self::IS_MARRIED => 'isMarried',
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

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }
    public function surname(Builder $builder, $value)
    {
        $builder->where('surname', 'like', "%{$value}%");
    }
    public function email(Builder $builder, $value)
    {
        $builder->where('email', 'like', "%{$value}%");
    }
    public function age(Builder $builder, $value)
    {
        $builder->where('age', 'like', "%{$value}%");
    }
    public function isMarried(Builder $builder, $value)
    {
        $builder->where('is_married', 'like', 1);
    }

}
