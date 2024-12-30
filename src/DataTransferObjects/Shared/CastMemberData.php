<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Shared;

use Rosebud\DataTransferObjects\ComputedData;

final readonly class CastMemberData
{
    public function __construct(
        public bool $adult,
        public int $gender,
        public int $id,
        public string $known_for_department,
        public string $name,
        public string $original_name,
        public float $popularity,
        public ?string $profile_path,
        public ?int $cast_id,
        public string $character,
        public string $credit_id,
        public int $order,
        public ComputedData $computed
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            adult: $data['adult'],
            gender: $data['gender'],
            id: $data['id'],
            known_for_department: $data['known_for_department'],
            name: $data['name'],
            original_name: $data['original_name'],
            popularity: $data['popularity'],
            profile_path: $data['profile_path'] ?? null,
            cast_id: $data['cast_id'] ?? null,
            character: $data['character'],
            credit_id: $data['credit_id'],
            order: $data['order'],
            computed: ComputedData::fromArray($data),
        );
    }

    public function toArray(): array
    {
        return [
            'adult' => $this->adult,
            'gender' => $this->gender,
            'id' => $this->id,
            'known_for_department' => $this->known_for_department,
            'name' => $this->name,
            'original_name' => $this->original_name,
            'popularity' => $this->popularity,
            'profile_path' => $this->profile_path,
            'cast_id' => $this->cast_id,
            'character' => $this->character,
            'credit_id' => $this->credit_id,
            'order' => $this->order,
            'computed' => $this->computed->toArray(),
        ];
    }
}