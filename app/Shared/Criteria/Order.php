<?php
declare(strict_types=1);
namespace App\Shared\Criteria;

use App\Shared\Criteria\Enums\OrderDirectionsEnum;

readonly class Order
{
    public function __construct(
        public string              $orderBy,
        public OrderDirectionsEnum $orderDirection
    )
    {}
}
