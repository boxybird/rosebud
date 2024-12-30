<?php

namespace Rosebud;

use Rosebud\DataTransferObjects\TvEpisodes\TvEpisodeData;
use Rosebud\Enums\ExternalSourcesEnum;

class TvEpisode extends Tmdb
{
    public function find(string $id, ExternalSourcesEnum $external_source = ExternalSourcesEnum::IMDB, bool $raw = false, int $times = 2, int $sleep = 2000): TvEpisodeData|array|null
    {
        return $this->findByID($id, $external_source, $raw, $times, $sleep);
    }
}