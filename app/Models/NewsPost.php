<?php

namespace App\Models;

use Database\Factories\NewsPostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsPost extends Content
{
    /** @use HasFactory<NewsPostFactory> */
    use HasFactory;
}
