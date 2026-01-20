<?php

namespace App\Repositories\Content;

use App\DTO\Output\NewsPostDTO;
use App\DTO\Output\VideoPostDTO;
use App\Enums\ContentTypesEnum;
use App\Models\Post;
use App\Repositories\Content\Contracts\ContentRepositoryInterface;
use App\Repositories\Contracts\AbstractRepository;
use App\Shared\Criteria\Contracts\CriteriaInterface;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\VarExporter\Exception\ExceptionInterface;
use Symfony\Component\VarExporter\Instantiator;

readonly class ContentRepository extends AbstractRepository implements ContentRepositoryInterface
{
    public function find(int $id): iterable
    {
        return [];
    }

    /**
     * @param CriteriaInterface $criteria
     * @return iterable
     * @throws ExceptionInterface
     */
    public function findByCriteria(CriteriaInterface $criteria): iterable
    {
        return $this->criteriaAdapter->query($criteria)->pipe(function (Builder $builder) {
            /** @var Post $post */
            foreach ($builder->cursor() as $post) {
                if ($post->type === ContentTypesEnum::TYPE_NEWS_POST) {
                    yield Instantiator::instantiate(NewsPostDTO::class, $post->toArray());
                } elseif ($post->type === ContentTypesEnum::TYPE_VIDEO_POST) {
                    yield Instantiator::instantiate(VideoPostDTO::class, $post->toArray());
                }
            }
        });
    }
}
