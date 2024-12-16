<?php

namespace Rosebud;

use Rosebud\DataTransferObjects\Movies\MovieData;
use Rosebud\DataTransferObjects\Movies\MovieDetailData;
use Rosebud\Enums\ExternalSourcesEnum;

class Movie extends Tmdb
{
    public function find(string $id, ExternalSourcesEnum $external_source = ExternalSourcesEnum::IMDB, int $times = 2, int $sleep = 2000): MovieData|null
    {
        $data = $this->findByID($id, $external_source, 'movie_results', $times, $sleep);

        return $data ? MovieData::fromArray($data) : null;
    }

    public function details(int $id, int $times = 2, int $sleep = 2000): MovieDetailData
    {
        $data = $this->get('https://api.themoviedb.org/3/movie/'.$id, [
            'append_to_response' => 'alternative_titles,credits,external_ids,images,keywords,latest,recommendations,release_dates,reviews,similar,releases,translations,videos,providers',
        ], $times, $sleep);

        return MovieDetailData::fromArray($data);
    }
}