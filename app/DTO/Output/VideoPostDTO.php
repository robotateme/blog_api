<?php
declare(strict_types=1);

namespace App\DTO\Output;

use App\Enums\ContentTypesEnum;

class VideoPostDTO
{
    public ?int $id;
    public ?string $title;
    public ?ContentTypesEnum $type;

    public ?string $description;
}
