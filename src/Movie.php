<?php

namespace Rosebud;

use Rosebud\DataTransferObjects\MovieLists\Popular;
use Rosebud\DataTransferObjects\Movies\MovieData;
use Rosebud\DataTransferObjects\Movies\MovieDetailsData;
use Rosebud\Enums\ExternalSourcesEnum;

class Movie extends Tmdb
{
    public function find(string $id, ExternalSourcesEnum $external_source = ExternalSourcesEnum::IMDB, bool $raw = false, int $times = 2, int $sleep = 2000): MovieData|array|null
    {
        return $this->findByID($id, $external_source, $raw, $times, $sleep);
    }

    public function details(int $id, bool $raw = false, int $times = 2, int $sleep = 2000): MovieDetailsData|array
    {
        $data = $this->get($this->base_url.'/movie/'.$id, [
            'append_to_response' => 'alternative_titles,credits,external_ids,images,keywords,latest,recommendations,release_dates,reviews,similar,releases,translations,videos,providers',
        ], $times, $sleep);

        return $raw ? $data : MovieDetailsData::fromArray($data);
    }

    public function popular(int $page = 1, bool $raw = false, int $times = 2, int $sleep = 2000): Popular|array
    {
        $data = $this->get($this->base_url.'/movie/popular', [
            'page' => $page,
        ], $times, $sleep);

        return $raw ? $data : Popular::fromArray($data);
    }
}
