<?php

namespace App\Models\Video;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

interface IVideoEmbedStrategy
{
    public function getEmbeddedVideo($videoLink);
}
