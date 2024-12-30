<?php

namespace Rosebud;

use Rosebud\DataTransferObjects\TvEpisodes\TvEpisodeData;
use Rosebud\Enums\ExternalSourcesEnum;

class TvEpisode extends Tmdb
{
    public function find(
        string $id,
        ExternalSourcesEnum $external_source = ExternalSourcesEnum::IMDB,
        bool $raw = false,
        int $times = self::DEFAULT_TIMES,
        int $sleep = self::DEFAULT_SLEEP
    ): TvEpisodeData|array|null {
        return parent::findByID($id, $external_source, $raw, $times, $sleep);
    }
}