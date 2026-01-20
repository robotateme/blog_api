<?php

namespace App\Shared\Criteria\Contracts;

interface CriteriaInterface
{
    public function __construct(
        ?array $filters = [],
        ?array $orderList = [],
        ?int   $offset = null,
        ?int   $limit = null
    );
}
