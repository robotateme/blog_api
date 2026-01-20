<?php

namespace App\Shared\Criteria\Contracts;

abstract readonly class AbstractCriteria implements CriteriaInterface
{

    public function __construct(
        public ?array $filters = null,
        public ?array $orderList = null,
        public ?int $offset = null,
        public ?int $limit = null
    ) {}
}
