<?php

namespace App\Models;

use Database\Factories\VideoPostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VideoPost extends Content
{
    /** @use HasFactory<VideoPostFactory> */
    use HasFactory;
}
