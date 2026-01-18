<?php

namespace App\Services\Content\Actions;

use App\Repositories\Content\Contracts\ContentRepositoryInterface;
use App\Services\Content\Contracts\GetContentActionInterface;


readonly class GetContentAction implements GetContentActionInterface
{

    public function __construct(private ContentRepositoryInterface $repository)
    {

    }

    /**
     * @return iterable
     */
    public function handle(): iterable
    {
        return $this->repository->all();
    }
}
