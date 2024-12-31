<?php

namespace Rosebud;

use Rosebud\DataTransferObjects\Movies\MovieData;
use Rosebud\DataTransferObjects\Movies\MovieDetailsData;
use Rosebud\DataTransferObjects\Movies\MovieListData;
use Rosebud\Enums\ExternalSourcesEnum;

class Movie extends Tmdb
{
    public function find(
        string $id,
        ExternalSourcesEnum $external_source = ExternalSourcesEnum::IMDB,
        bool $raw = false,
        int $times = self::DEFAULT_TIMES,
        int $sleep = self::DEFAULT_SLEEP
    ): MovieData|array|null {
        return $this->findByID($id, $external_source, $raw, $times, $sleep);
    }

    public function details(
        int $id,
        bool $raw = false,
        int $times = self::DEFAULT_TIMES,
        int $sleep = self::DEFAULT_SLEEP
    ): MovieDetailsData|array {
        $data = $this->get($this->base_url.'/movie/'.$id, [
            'append_to_response' => $this->getDetailsAppendParams()
        ], $times, $sleep);

        return $raw ? $data : MovieDetailsData::fromArray($data);
    }

    protected function getDetailsAppendParams(): string
    {
        return implode(',', [
            'alternative_titles',
            'credits',
            'external_ids',
            'images',
            'keywords',
            'latest',
            'recommendations',
            'release_dates',
            'reviews',
            'similar',
            'releases',
            'translations',
            'videos',
            'providers'
        ]);
    }

    public function popular(
        int $page = 1,
        bool $raw = false,
        int $times = self::DEFAULT_TIMES,
        int $sleep = self::DEFAULT_SLEEP
    ): MovieListData|array {
        $data = $this->get($this->base_url.'/movie/popular', [
            'page' => $page
        ], $times, $sleep);

        return $raw ? $data : MovieListData::fromArray($data);
    }

    public function search(
        string $query,
        array $query_params = [],
        bool $raw = false,
        int $times = self::DEFAULT_TIMES,
        int $sleep = self::DEFAULT_SLEEP
    ): MovieListData|array {
        $default_query_params = [
            'page' => 1,
            'include_adult' => false,
            'language' => '',
            'primary_release_year' => '',
            'region' => '',
            'year' => ''
        ];

        $query_params = array_merge($default_query_params, $query_params);
        $filter_params = array_filter($query_params);
        $query = array_merge($filter_params, ['query' => $query]);

        $data = $this->get($this->base_url.'/search/movie', $query, $times, $sleep);

        return $raw ? $data : MovieListData::fromArray($data);
    }
}
