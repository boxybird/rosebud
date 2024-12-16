<?php

namespace Rosebud;

use Rosebud\DataTransferObjects\TvEpisodeData;
use Rosebud\Enums\ExternalSourcesEnum;

class TvEpisode extends Tmdb
{
    public function find(string $id, ExternalSourcesEnum $external_source = ExternalSourcesEnum::IMDB, int $times = 2, int $sleep = 2000): TvEpisodeData|null
    {
        $data = $this->findByID($id, $external_source, 'tv_episode_results', $times, $sleep);

        return $data ? TvEpisodeData::fromArray($data) : null;
    }
}