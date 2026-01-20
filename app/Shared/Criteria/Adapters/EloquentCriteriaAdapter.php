<?php

namespace App\Shared\Criteria\Adapters;

use App\Shared\Criteria\Contracts\AbstractCriteria;
use App\Shared\Criteria\Contracts\CriteriaInterface;
use App\Shared\Criteria\Enums\FilterOperatorsEnum;
use App\Shared\Criteria\Filter;
use App\Shared\Criteria\Order;
use Closure;
use Generator;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Symfony\Component\VarExporter\Exception\ExceptionInterface;
use Symfony\Component\VarExporter\Instantiator;

class EloquentCriteriaAdapter implements EloquentCriteriaInterface
{
    /**
     */
    public function __construct(
        protected EloquentBuilder $eloquentBuilder,
    )
    {
    }

    public function query(AbstractCriteria $criteria): EloquentBuilder
    {
        return $this->applyFilters($criteria)
            ->applyOrders($criteria)
            ->eloquentBuilder
            ->when(is_int($criteria->limit), function (EloquentBuilder $builder) use ($criteria) {
                return $builder->limit($criteria->limit);
            })
            ->when(is_int($criteria->offset), function (EloquentBuilder $builder) use ($criteria) {
                return $builder->offset($criteria->offset);
            });
    }

    /**
     * @param AbstractCriteria $criteria
     * @return EloquentCriteriaAdapter
     */
    public function applyFilters(CriteriaInterface $criteria): EloquentCriteriaAdapter
    {
        foreach ($criteria->filters as $criteriaFilter) {
            if ($criteriaFilter instanceof Filter) {
                match ($criteriaFilter->operator) {
                    FilterOperatorsEnum::EQUAL => $this->eloquentBuilder
                        ->where($criteriaFilter->field, '=', $criteriaFilter->value),
                    FilterOperatorsEnum::NOT_EQUAL => $this->eloquentBuilder
                        ->whereNot($criteriaFilter->field, $criteriaFilter->value),
                    FilterOperatorsEnum::GT => $this->eloquentBuilder
                        ->where($criteriaFilter->field, '>', $criteriaFilter->value),
                    FilterOperatorsEnum::GTE => $this->eloquentBuilder
                        ->where($criteriaFilter->field, '>=', $criteriaFilter->value),
                    FilterOperatorsEnum::LTE => $this->eloquentBuilder
                        ->where($criteriaFilter->field, '<=', $criteriaFilter->value),
                    FilterOperatorsEnum::LT => $this->eloquentBuilder
                        ->where($criteriaFilter->field, '<', $criteriaFilter->value),
                    FilterOperatorsEnum::CONTAINS => $this->eloquentBuilder
                        ->where($criteriaFilter->field, 'like', '%' . $criteriaFilter->value . '%'),
                    FilterOperatorsEnum::NOT_CONTAINS => $this->eloquentBuilder
                        ->whereNot($criteriaFilter->field, 'like', '%' . $criteriaFilter->value . '%'),
                    FilterOperatorsEnum::IN => $this->eloquentBuilder
                        ->whereIn($criteriaFilter->field, $criteriaFilter->value),
                    FilterOperatorsEnum::NOT_IN => $this->eloquentBuilder
                        ->whereNotIn($criteriaFilter->field, $criteriaFilter->value),
                };
            }
        }

        return $this;
    }

    /**
     * @param AbstractCriteria $criteria
     * @return EloquentCriteriaAdapter
     */
    public function applyOrders(CriteriaInterface $criteria): EloquentCriteriaAdapter
    {
        foreach ($criteria->orderList as $criteriaOrder) {
            if ($criteriaOrder instanceof Order) {
                $this->eloquentBuilder->orderBy(
                    $criteriaOrder->orderBy,
                    $criteriaOrder->orderDirection->value
                );
            }
        }

        return $this;
    }
}
