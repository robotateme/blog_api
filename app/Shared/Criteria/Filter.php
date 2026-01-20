<?php
declare(strict_types=1);
namespace App\Shared\Criteria;

use App\Shared\Criteria\Enums\FilterOperatorsEnum;

readonly class Filter
{
    public function __construct(
        public string              $field,
        public FilterOperatorsEnum $operator,
        public mixed               $value
    )
    {
    }
}
