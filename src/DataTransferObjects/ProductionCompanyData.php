<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects;

final readonly class ProductionCompanyData
{
    public function __construct(
        public int $id,
        public ?string $logo_path,
        public string $name,
        public string $origin_country,
        public ComputedData $computed
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            logo_path: $data['logo_path'],
            name: $data['name'],
            origin_country: $data['origin_country'],
            computed: ComputedData::fromArray($data),
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'logo_path' => $this->logo_path,
            'name' => $this->name,
            'origin_country' => $this->origin_country,
            'computed' => $this->computed->toArray(),
        ];
    }
}
