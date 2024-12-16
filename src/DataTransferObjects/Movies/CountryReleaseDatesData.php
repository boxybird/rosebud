<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Movies;

final readonly class CountryReleaseDatesData
{
    public function __construct(
        public string $iso_3166_1,
        /** @var ReleaseDateData[] */
        public array $release_dates,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            iso_3166_1: $data['iso_3166_1'],
            release_dates: array_map(fn(array $date) => ReleaseDateData::fromArray($date), $data['release_dates']),
        );
    }

    public function toArray(): array
    {
        return [
            'iso_3166_1' => $this->iso_3166_1,
            'release_dates' => array_map(fn(ReleaseDateData $date) => $date->toArray(), $this->release_dates),
        ];
    }
}