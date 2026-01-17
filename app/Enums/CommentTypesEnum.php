<?php

namespace App\Enums;

use Illuminate\Database\Eloquent\Factories\HasFactory;

enum CommentTypesEnum: string
{
    case TYPE_VIDEO_POST = 'VIDEO_POST';
    case TYPE_NEWS_POST = 'NEWS_POST';

}
