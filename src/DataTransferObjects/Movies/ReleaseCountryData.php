<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Movies;

final readonly class ReleaseCountryData
{
    public function __construct(
        public string $certification,
        /** @var string[] */
        public array $descriptors,
        public string $iso_3166_1,
        public bool $primary,
        public string $release_date
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            certification: $data['certification'],
            descriptors: $data['descriptors'],
            iso_3166_1: $data['iso_3166_1'],
            primary: $data['primary'],
            release_date: $data['release_date']
        );
    }

    public function toArray(): array
    {
        return [
            'certification' => $this->certification,
            'descriptors' => $this->descriptors,
            'iso_3166_1' => $this->iso_3166_1,
            'primary' => $this->primary,
            'release_date' => $this->release_date
        ];
    }
}