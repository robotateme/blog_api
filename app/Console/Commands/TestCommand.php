<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Repositories\Content\ContentRepository;
use App\Shared\Criteria\Criteria;
use App\Shared\Criteria\Enums\FilterOperatorsEnum;
use App\Shared\Criteria\Enums\OrderDirectionsEnum;
use App\Shared\Criteria\Filter;
use App\Shared\Criteria\Order;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(ContentRepository $repository): void
    {
        $criteria = new Criteria(
            [
                new Filter('id', FilterOperatorsEnum::GT, 1),
                new Filter('id', FilterOperatorsEnum::LT, 100),
            ],
            [new Order('id', OrderDirectionsEnum::DESC)]
        );

        $result = $repository->findByCriteria($criteria);
        foreach ($result as $item) {
            dump($item);
        };
    }
}
