<?php

namespace App\Shared\Criteria\Adapters;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

interface EloquentCriteriaInterface
{
    public function __construct(
        EloquentBuilder $eloquentBuilder,
    );
}
