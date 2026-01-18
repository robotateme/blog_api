<?php

namespace App\Services\Content;

use App\Services\Content\Contracts\ContentServiceInterface;
use App\Services\Content\Contracts\GetContentScenarioInterface;
use App\Services\Content\Scenarios\GetContentScenario;

readonly class ContentService implements ContentServiceInterface
{

    /**
     * @param GetContentScenario $scenario
     */
    public function __construct(private GetContentScenarioInterface $scenario)
    {
    }

    public function getContent(): iterable
    {
        return $this->scenario->execute();
    }
}
