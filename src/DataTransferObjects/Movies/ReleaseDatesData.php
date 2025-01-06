<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Movies;

final readonly class ReleaseDatesData
{
    public function __construct(
        /** @var CountryReleaseDatesData[] */
        public array $results,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            results: array_map(fn(array $countryData): CountryReleaseDatesData => CountryReleaseDatesData::fromArray($countryData), $data['results']),
        );
    }

    public function toArray(): array
    {
        return [
            'results' => array_map(fn(CountryReleaseDatesData $countryData): array => $countryData->toArray(), $this->results),
        ];
    }
}