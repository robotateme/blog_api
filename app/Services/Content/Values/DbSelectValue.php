<?php

namespace App\Services\Content\Values;

use App\Enums\ContentTypesEnum;

final readonly class DbSelectValue
{
    private string $value;

    public function __construct(ContentTypesEnum $value)
    {
        $this->value = $value->value;
    }

    public function getValue(): string
    {
        return "'$this->value' as type";
    }

    public function __toString(): string
    {
        return $this->getValue();
    }
}
