<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Movies;

final readonly class ReviewsData
{

    public function __construct(
        public int $page,
        /** @var ReviewData[] */
        public array $results,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            page: $data['page'],
            results: array_map(fn(array $review): ReviewData => ReviewData::fromArray($review), $data['results']),
        );
    }

    public function toArray(): array
    {
        return [
            'page' => $this->page,
            'results' => array_map(fn(ReviewData $review): array => $review->toArray(), $this->results),
        ];
    }
}