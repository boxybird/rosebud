<?php

namespace Rosebud;

use Rosebud\DataTransferObjects\TvEpisodes\TvEpisodeData;
use Rosebud\Enums\ExternalIdsEnum;

class TvEpisode extends Tmdb
{
    public function find(
        string $id,
        ExternalIdsEnum $external_source = ExternalIdsEnum::IMDB,
        bool $raw = false,
        int $times = self::DEFAULT_TIMES,
        int $sleep = self::DEFAULT_SLEEP
    ): TvEpisodeData|array|null {
        return parent::findByID($id, $external_source, $raw, $times, $sleep);
    }
}