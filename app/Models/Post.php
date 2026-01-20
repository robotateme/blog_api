<?php

namespace App\Models;

use App\Enums\ContentTypesEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    /** @use HasFactory<PostFactory> */
    use HasFactory;

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'commentable_id', 'id');
    }

    public function type(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ContentTypesEnum::from($value),
            set: fn($value) => $value instanceof ContentTypesEnum ? $value->value : $value,
        );
    }
}
