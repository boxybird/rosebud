<?php

namespace Rosebud;

use Exception;
use Illuminate\Http\Client\Factory as Http;
use Rosebud\Enums\ExternalSourcesEnum;

abstract class Tmdb
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

    public function findByID(string $external_id, ExternalSourcesEnum $external_source, string $results_key, int $times = 2, int $sleep = 2000): array
    {
        $results = $this->get('https://api.themoviedb.org/3/find/'.$external_id, [
            'external_source' => $external_source->value,
        ], $times, $sleep);

        return $results[$results_key][0] ?? [];
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
