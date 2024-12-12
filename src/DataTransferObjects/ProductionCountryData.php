<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects;

final readonly class ProductionCountryData
{
    public function __construct(
        public string $iso_3166_1,
        public string $name
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            iso_3166_1: $data['iso_3166_1'],
            name: $data['name']
        );
    }

    public function toArray(): array
    {
        return [
            'iso_3166_1' => $this->iso_3166_1,
            'name' => $this->name
        ];
    }
}
