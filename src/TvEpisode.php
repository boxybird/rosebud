<?php

namespace Rosebud;

use Rosebud\DataTransferObjects\TvEpisodes\TvEpisodeData;
use Rosebud\DataTransferObjects\TvEpisodes\TvEpisodeDetailsData;
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

    public function details(
        int $series_id,
        int $season_number,
        int $episode_number,
        bool $raw = false,
        int $times = self::DEFAULT_TIMES,
        int $sleep = self::DEFAULT_SLEEP
    ): TvEpisodeDetailsData|array {
        $data = $this->get($this->base_url.'/tv/'.$series_id.'/season/'.$season_number.'/episode/'.$episode_number, [
            'append_to_response' => $this->getDetailsAppendParams()
        ], $times, $sleep);

        return $raw ? $data : TvEpisodeDetailsData::fromArray($data);
    }

    protected function getDetailsAppendParams(): string
    {
        return implode(',', [
            'credits',
            'external_ids',
            'images',
            'translations',
            'videos',
        ]);
    }
}