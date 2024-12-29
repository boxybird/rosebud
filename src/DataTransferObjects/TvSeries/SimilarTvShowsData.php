<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\TvSeries;

final readonly class SimilarTvShowsData
{
    public function __construct(
        public int $page,
        /** @var SimilarTvShowData[] */
        public array $results,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            page: $data['page'],
            results: array_map(fn(array $movie) => SimilarTvShowData::fromArray($movie), $data['results']),
        );
    }

    public function toArray(): array
    {
        return [
            'page' => $this->page,
            'results' => array_map(fn(SimilarTvShowData $movie) => $movie->toArray(), $this->results),
        ];
    }
}