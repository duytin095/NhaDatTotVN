<?php

namespace App\Models\Video;

use Illuminate\Support\Facades\Http;

class TikTokVideoEmbedStrategy implements IVideoEmbedStrategy
{
    public function getEmbeddedVideo($videoLink)
    {
        // sample https://www.tiktok.com/oembed?url=https://www.tiktok.com/@scout2015/video/6718335390845095173
        $response = Http::get('https://www.tiktok.com/oembed?url='.$videoLink);
        return $response->json('html');
    }
}
