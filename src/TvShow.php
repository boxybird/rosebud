<?php

namespace Rosebud;

use Rosebud\DataTransferObjects\TvSeries\TvShowData;
use Rosebud\DataTransferObjects\TvSeries\TvShowDetailsData;
use Rosebud\Enums\ExternalSourcesEnum;

class TvShow extends Tmdb
{
    public function find(string $id, ExternalSourcesEnum $external_source = ExternalSourcesEnum::IMDB, int $times = 2, int $sleep = 2000): TvShowData|null
    {
        $data = $this->findByID($id, $external_source, $times, $sleep);

        return $data ?? null;
    }

    public function details(int $id, int $times = 2, int $sleep = 2000): TvShowDetailsData
    {
        $data = $this->get($this->base_url.'/movie/'.$id, [
            'append_to_response' => 'alternative_titles,credits,external_ids,images,keywords,latest,recommendations,release_dates,reviews,similar,releases,translations,videos,providers',
        ], $times, $sleep);

        return TvShowDetailsData::fromArray($data);
    }
}