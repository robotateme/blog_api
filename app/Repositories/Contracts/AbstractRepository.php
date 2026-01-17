<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

readonly class AbstractRepository implements RepositoryInterface
{
    /**
     * @param  Model  $model
     */
    public function __construct(private Model $model)
    {
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
        return $this->getBuilder()
            ->get()
            ->toArray();
    }
}
