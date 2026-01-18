<?php

namespace App\Services\Content\Scenarios;

use App\Services\Content\Actions\GetContentAction;
use App\Services\Content\Contracts\GetContentActionInterface;
use App\Services\Content\Contracts\GetContentScenarioInterface;

readonly class GetContentScenario implements GetContentScenarioInterface
{
    /**
     * @param GetContentAction $getContentAction
     */
    public function __construct(private GetContentActionInterface $getContentAction)
    {
    }

    public function execute(): iterable
    {
        return $this->getContentAction->handle();
    }
}
