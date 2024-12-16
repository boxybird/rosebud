<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Movies;

final readonly class ReleasesData
{
    public function __construct(
        /** @var ReleaseCountryData[] */
        public array $countries
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            countries: array_map(fn(array $country) => ReleaseCountryData::fromArray($country), $data['countries'])
        );
    }

    public function toArray(): array
    {
        return [
            'countries' => array_map(fn(ReleaseCountryData $country) => $country->toArray(), $this->countries)
        ];
    }
}