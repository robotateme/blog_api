<?php

namespace App\Services\Content\Contracts;

use App\Repositories\Content\Contracts\ContentRepositoryInterface;
use App\Services\Contracts\ActionInterface;

interface GetContentActionInterface extends ActionInterface
{
    public function __construct(ContentRepositoryInterface $repository);

    public function handle();
}
