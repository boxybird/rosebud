<?php

namespace Rosebud\DataTransferObjects\TvSeries;

use Rosebud\DataTransferObjects\ComputedData;
use Rosebud\Enums\GendersEnum;

final readonly class CreatedByData
{
    public function __construct(
        public int $id,
        public string $credit_id,
        public string $name,
        public ?GendersEnum $gender,
        public ?string $profile_path,
        public ComputedData $computed
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            credit_id: $data['credit_id'],
            name: $data['name'],
            gender: $data['gender'] ?? null ? GendersEnum::fromInt((int) $data['gender']) : null,
            profile_path: $data['profile_path'] ?? null,
            computed: ComputedData::fromArray($data),
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'credit_id' => $this->credit_id,
            'name' => $this->name,
            'gender' => $this->gender?->getName(),
            'profile_path' => $this->profile_path,
            'computed' => $this->computed->toArray(),
        ];
    }
}