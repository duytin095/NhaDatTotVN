<?php

namespace App\Models\Video;

class YouTubeVideoEmbedStrategy implements IVideoEmbedStrategy
{
    public function getEmbeddedVideo($videoLink)
    {
        // YouTube specific logic to get embedded video
        $videoId = explode("watch?v=", $videoLink);
        $fullEmbedUrl = 'https://www.youtube.com/embed/' . $videoId[1];
        return $fullEmbedUrl;
    }
}
