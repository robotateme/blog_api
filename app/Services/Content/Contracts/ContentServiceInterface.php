<?php

namespace App\Services\Content\Contracts;

use App\Services\Contracts\ServiceInterface;

interface ContentServiceInterface extends ServiceInterface
{
    public function __construct(GetContentScenarioInterface $scenario);

    public function getContent();
}
