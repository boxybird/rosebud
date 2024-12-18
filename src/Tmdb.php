<?php

namespace Rosebud;

use Exception;
use Illuminate\Http\Client\Factory as Http;
use Rosebud\DataTransferObjects\Movies\MovieData;
use Rosebud\DataTransferObjects\People\PersonData;
use Rosebud\DataTransferObjects\TvEpisodes\TvEpisodeData;
use Rosebud\DataTransferObjects\TvSeries\TvShowData;
use Rosebud\Enums\ExternalSourcesEnum;

class Tmdb
{
    protected array $headers = [];

    public function __construct(
        protected readonly string $api_key,
        protected readonly string $base_url = 'https://api.themoviedb.org/3'
    ) {
        $this->headers = [
            'Authorization' => 'Bearer '.$this->api_key,
            'Content-Type' => 'application/json',
        ];
    }

    public function findByID(string $external_id, ExternalSourcesEnum $external_source = ExternalSourcesEnum::IMDB, int $times = 2, int $sleep = 2000): MovieData|PersonData|TvShowData|TvEpisodeData|null
    {
        $results = $this->get($this->base_url.'/find/'.$external_id, [
            'external_source' => $external_source->value,
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
            'tv_results' => TvShowData::fromArray($data),
            'tv_episode_results' => TvEpisodeData::fromArray($data),
            default => null
        };
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
