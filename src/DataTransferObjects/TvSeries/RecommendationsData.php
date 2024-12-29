<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\TvSeries;

final readonly class RecommendationsData
{
    public function __construct(
        public int $page,
        /** @var TvShowData[] */
        public array $results,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            page: $data['page'],
            results: array_map(fn(array $movie) => TvShowData::fromArray($movie), $data['results']),
        );
    }

    public function toArray(): array
    {
        return [
            'page' => $this->page,
            'results' => array_map(fn(TvShowData $movie) => $movie->toArray(), $this->results),
        ];
    }
}