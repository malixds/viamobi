<?php

declare(strict_types=1);

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class FilterRange implements Filter
{
    public function __construct(
        public string $property,
    )
    {
    }

    public function __invoke(Builder $query, $value, string $property): void
    {
        $from = !empty($value['from']) ? $value['from'] : 0;
        $to = !empty($value['to']) ? $value['to'] : 9999999999;

        $query->whereBetween($this->property, [$from, $to]);
    }

}
