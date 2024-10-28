<?php

namespace App\Models\Video;

class VideoEmbedStrategyFactory
{
    private $strategies = [];

    public function __construct()
    {
        $this->strategies = [
            YOUTUBE => YouTubeVideoEmbedStrategy::class,
            TIKTOK => TikTokVideoEmbedStrategy::class,
            // Add more platforms as needed
        ];
    }

    public function getStrategy($platformId)
    {
        if (!isset($this->strategies[$platformId])) {
            throw new \InvalidArgumentException("Unsupported platform ID");
        }

        return new $this->strategies[$platformId];
    }
}
