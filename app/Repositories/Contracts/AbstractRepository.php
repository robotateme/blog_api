<?php

namespace App\Repositories\Contracts;

use App\Shared\Criteria\Adapters\EloquentCriteriaAdapter;
use App\Shared\Criteria\Adapters\EloquentCriteriaInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

readonly class AbstractRepository implements RepositoryInterface
{
    protected EloquentCriteriaInterface $criteriaAdapter;
    /**
     * @param  Model  $model
     */
    public function __construct(
        private Model $model,
    )
    {
        $this->criteriaAdapter = new EloquentCriteriaAdapter($this->getBuilder());
    }

    /**
     * @return Builder
     */
    protected function getBuilder(): Builder
    {
        return $this->model->newModelQuery();
    }

    /**
     * @param int $id
     * @return iterable
     */
    public function find(int $id): iterable
    {
        return $this->getBuilder()->find($id)
            ->first()
            ->toArray();
    }

    public function all(): iterable
    {
        return [];
    }
}
