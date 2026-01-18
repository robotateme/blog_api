<?php

namespace App\Enums;

use Illuminate\Database\Eloquent\Factories\HasFactory;

enum ContentTypesEnum: string
{
    case TYPE_VIDEO_POST = 'VIDEO_POST';
    case TYPE_NEWS_POST = 'NEWS_POST';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
