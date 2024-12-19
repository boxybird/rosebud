<?php

namespace Rosebud\DataTransferObjects\MovieLists;

use Rosebud\DataTransferObjects\Movies\MovieData;

final readonly class Popular
{
    public function __construct(
        public int $page,
        /** @var MovieData[] */
        public array $results,
        public int $total_pages,
        public int $total_results,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            page: $data['page'],
            results: array_map(fn(array $movie) => MovieData::fromArray($movie), $data['results']),
            total_pages: $data['total_pages'],
            total_results: $data['total_results'],
        );
    }

    public function toArray(): array
    {
        return [
            'page' => $this->page,
            'results' => array_map(fn(MovieData $movie) => $movie->toArray(), $this->results),
            'total_pages' => $this->total_pages,
            'total_results' => $this->total_results,
        ];
    }
}