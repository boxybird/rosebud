<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Movies;

final readonly class RecommendationsData
{
    public function __construct(
        public int $page,
        /** @var RecommendedData[] */
        public array $results,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            page: $data['page'],
            results: array_map(fn(array $movie) => RecommendedData::fromArray($movie), $data['results']),
        );
    }

    public function toArray(): array
    {
        return [
            'page' => $this->page,
            'results' => array_map(fn(RecommendedData $movie) => $movie->toArray(), $this->results),
        ];
    }
}