<?php

namespace Rosebud;

use Exception;
use Illuminate\Http\Client\Factory as Http;
use Rosebud\DataTransferObjects\Movies\MovieData;
use Rosebud\DataTransferObjects\People\PersonData;
use Rosebud\DataTransferObjects\TvEpisodes\TvEpisodeData;
use Rosebud\DataTransferObjects\TvSeries\TvShowData;
use Rosebud\Enums\ExternalIdsEnum;

class Tmdb
{
    protected const DEFAULT_TIMES = 2;
    protected const DEFAULT_SLEEP = 2000;
    protected const BASE_URL = 'https://api.themoviedb.org/3';

    protected array $headers;

    public function __construct(
        protected readonly string $api_key,
        protected readonly string $base_url = self::BASE_URL
    ) {
        $this->headers = [
            'Authorization' => 'Bearer '.$this->api_key,
            'Content-Type' => 'application/json',
        ];
    }

    public function findByID(
        string $external_id,
        ExternalIdsEnum $external_source = ExternalIdsEnum::IMDB,
        bool $raw = false,
        int $times = self::DEFAULT_TIMES,
        int $sleep = self::DEFAULT_SLEEP
    ): MovieData|PersonData|TvShowData|TvEpisodeData|array|null {
        $results = $this->get($this->base_url.'/find/'.$external_id, [
            'external_source' => $external_source->value,
        ], $times, $sleep);

        $filtered_results = array_filter($results, fn($result): bool => !empty($result));
        $key = array_key_first($filtered_results);
        $data = $filtered_results[$key][0] ?? [];

        if (empty($key) || empty($data)) {
            return null;
        }

        return match ($key) {
            'movie_results' => $raw ? $data : MovieData::fromArray($data),
            'person_results' => $raw ? $data : PersonData::fromArray($data),
            'tv_results' => $raw ? $data : TvShowData::fromArray($data),
            'tv_episode_results' => $raw ? $data : TvEpisodeData::fromArray($data),
            default => null
        };
    }

    protected function get(
        string $url,
        array $query = [],
        int $times = self::DEFAULT_TIMES,
        int $sleep = self::DEFAULT_SLEEP
    ): array {
        try {
            $response = (new Http())
                ->withHeaders($this->headers)
                ->retry($times, $sleep)
                ->get($url, $query);

            return $response->successful() ? $response->json() : [];
        } catch (Exception) {
            return [];
        }
    }
}
