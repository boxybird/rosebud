<?php

namespace Rosebud;

use Rosebud\DataTransferObjects\TvSeries\TvShowData;
use Rosebud\DataTransferObjects\TvSeries\TvShowDetailsData;
use Rosebud\Enums\ExternalSourcesEnum;

class TvShow extends Tmdb
{
    public function find(
        string $id,
        ExternalSourcesEnum $external_source = ExternalSourcesEnum::IMDB,
        bool $raw = false,
        int $times = self::DEFAULT_TIMES,
        int $sleep = self::DEFAULT_SLEEP
    ): TvShowData|array|null {
        return $this->findByID($id, $external_source, $raw, $times, $sleep);
    }

    public function details(
        int $id,
        bool $raw = false,
        int $times = self::DEFAULT_TIMES,
        int $sleep = self::DEFAULT_SLEEP
    ): TvShowDetailsData|array {
        $response = $this->get($this->base_url.'/tv/'.$id, [
            'append_to_response' => $this->getDetailsAppendParams()
        ], $times, $sleep);

        return $raw ? $response : TvShowDetailsData::fromArray($response);
    }

    protected function getDetailsAppendParams(): string
    {
        return implode(',', [
            'aggregate_credits',
            'alternative_titles',
            'content_ratings',
            'credits',
            'external_ids',
            'images',
            'keywords',
            'recommendations',
            'reviews',
            'screened_theatrically',
            'similar',
            'translations',
            'videos'
        ]);
    }
}