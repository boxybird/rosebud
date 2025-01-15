<?php

namespace Rosebud\DataTransferObjects\TvSeries;

use Rosebud\DataTransferObjects\ComputedData;

final readonly class NetworkData
{
    public function __construct(
        public int $id,
        public string $name,
        public ?string $logo_path,
        public string $origin_country,
        public ComputedData $computed
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
            logo_path: $data['logo_path'] ?? null,
            origin_country: $data['origin_country'],
            computed: ComputedData::fromArray($data),
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'logo_path' => $this->logo_path,
            'origin_country' => $this->origin_country,
            'computed' => $this->computed->toArray(),
        ];
    }
}