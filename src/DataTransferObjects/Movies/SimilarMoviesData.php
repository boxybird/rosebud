<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Movies;

final readonly class SimilarMoviesData
{
    public function __construct(
        public int $page,
        /** @var SimilarMovieData[] */
        public array $results,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            page: $data['page'],
            results: array_map(fn(array $movie) => SimilarMovieData::fromArray($movie), $data['results']),
        );
    }

    public function toArray(): array
    {
        return [
            'page' => $this->page,
            'results' => array_map(fn(SimilarMovieData $movie) => $movie->toArray(), $this->results),
        ];
    }
}