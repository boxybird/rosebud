<?php

namespace Rosebud;

use Rosebud\DataTransferObjects\MovieLists\Popular;
use Rosebud\DataTransferObjects\Movies\MovieData;
use Rosebud\DataTransferObjects\Movies\MovieDetailsData;
use Rosebud\Enums\ExternalSourcesEnum;

class Movie extends Tmdb
{
    public function find(string $id, ExternalSourcesEnum $external_source = ExternalSourcesEnum::IMDB, int $times = 2, int $sleep = 2000): MovieData|null
    {
        $data = $this->findByID($id, $external_source, $times, $sleep);

        return $data ?? null;
    }

    public function details(int $id, int $times = 2, int $sleep = 2000): MovieDetailsData
    {
        $data = $this->get($this->base_url.'/movie/'.$id, [
            'append_to_response' => 'alternative_titles,credits,external_ids,images,keywords,latest,recommendations,release_dates,reviews,similar,releases,translations,videos,providers',
        ], $times, $sleep);

        return MovieDetailsData::fromArray($data);
    }

    public function popular(int $page = 1, int $times = 2, int $sleep = 2000): Popular
    {
        $data = $this->get($this->base_url.'/movie/popular', [
            'page' => $page,
        ], $times, $sleep);

        return Popular::fromArray($data);
    }
}
