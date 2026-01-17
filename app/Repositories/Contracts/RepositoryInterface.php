<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    /**
     * @return mixed
     */
    public function all(): iterable;

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id): iterable;
}
