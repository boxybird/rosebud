<?php

namespace Rosebud;

use Exception;
use Illuminate\Http\Client\Factory as Http;
use Rosebud\DataTransferObjects\MovieData;
use Rosebud\DataTransferObjects\MovieDetailData;
use Rosebud\DataTransferObjects\PersonData;
use Rosebud\DataTransferObjects\TvData;
use Rosebud\DataTransferObjects\TvEpisodeData;

class Tmdb
{
    protected array $headers = [];

    public function __construct(
        protected string $api_key,
        protected string $base_url = 'https://api.themoviedb.org/3'
    ) {
        $this->headers = [
            'Authorization' => 'Bearer '.$this->api_key,
            'Content-Type' => 'application/json',
        ];
    }

    public function findByImdbId(string $id, int $times = 2, int $sleep = 2000): MovieData|PersonData|TvData|TvEpisodeData|null
    {
        $results = $this->get('https://api.themoviedb.org/3/find/'.$id, [
            'external_source' => 'imdb_id',
        ], $times, $sleep);

        $filtered_results = array_filter($results, function ($result) {
            return !empty($result);
        });

        $key = array_key_first($filtered_results);
        $data = $filtered_results[$key][0] ?? [];

        if (empty($key) || empty($data)) {
            return null;
        }

        return match ($key) {
            'movie_results' => MovieData::fromArray($data),
            'person_results' => PersonData::fromArray($data),
            'tv_results' => TvData::fromArray($data),
            'tv_episode_results' => TvEpisodeData::fromArray($data),
            default => null
        };
    }

    public function movieDetails(int $id, int $times = 2, int $sleep = 2000): MovieDetailData
    {
        $data = $this->get('https://api.themoviedb.org/3/movie/'.$id, [
            'append_to_response' => 'credits,videos,images',
        ], $times, $sleep);

        return MovieDetailData::fromArray($data);
    }

    protected function get(string $url, array $query = [], int $times = 2, int $sleep = 2000): array
    {
        try {
            $response = (new Http())
                ->withHeaders($this->headers)
                ->retry($times, $sleep)
                ->get($url, $query);

            if ($response->failed()) {
                return [];
            }

            return $response->json();
        } catch (Exception) {
            return [];
        }
    }
}
