<?php

namespace App\Repositories\Content;

use App\Repositories\Content\Contracts\ContentRepositoryInterface;
use App\Repositories\Contracts\AbstractRepository;

readonly class ContentRepository extends AbstractRepository implements ContentRepositoryInterface
{
    public function allPaginate(
        $per_page = 10,
        $columns = ['*']
    ): iterable
    {
        $posts = $this->getBuilder()
            ->with('comments');
        return $posts->cursorPaginate();
    }

    public function find(int $id): iterable
    {
        return [];
    }
}
