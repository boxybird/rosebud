<?php

namespace Rosebud;

use Rosebud\DataTransferObjects\TvSeries\TvShowData;
use Rosebud\DataTransferObjects\TvSeries\TvShowDetailsData;
use Rosebud\Enums\ExternalSourcesEnum;

class TvShow extends Tmdb
{
    public function find(string $id, ExternalSourcesEnum $external_source = ExternalSourcesEnum::IMDB, bool $raw = false, int $times = 2, int $sleep = 2000): TvShowData|array|null
    {
        return $this->findByID($id, $external_source, $raw, $times, $sleep);
    }

    public function details(int $id, bool $raw = false, int $times = 2, int $sleep = 2000): TvShowDetailsData|array
    {
        $data = $this->get($this->base_url.'/tv/'.$id, [
            'append_to_response' => 'aggregate_credits,alternative_titles,content_ratings,credits,external_ids,images,keywords,recommendations,reviews,screened_theatrically,similar,translations,videos',
        ], $times, $sleep);

        return $raw ? $data : TvShowDetailsData::fromArray($data);
    }
}