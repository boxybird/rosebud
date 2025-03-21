<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Movies;

final readonly class RecommendationsData
{
    public function __construct(
        public int $page,
        /** @var MovieData[] */
        public array $results,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            page: $data['page'],
            results: array_map(fn(array $movie): MovieData => MovieData::fromArray($movie), $data['results']),
        );
    }

    public function toArray(): array
    {
        return [
            'page' => $this->page,
            'results' => array_map(fn(MovieData $movie): array => $movie->toArray(), $this->results),
        ];
    }
}