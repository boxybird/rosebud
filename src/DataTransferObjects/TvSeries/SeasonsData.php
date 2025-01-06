<?php

namespace Rosebud\DataTransferObjects\TvSeries;

final readonly class SeasonsData
{
    public function __construct(
        /** @var SeasonData[] */
        public array $seasons,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            seasons: array_map(fn($item): SeasonData => SeasonData::fromArray($item), $data['seasons']),
        );
    }

    public function toArray(): array
    {
        return [
            'seasons' => array_map(fn(SeasonData $item): array => $item->toArray(), $this->seasons),
        ];
    }
}