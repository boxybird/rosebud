<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Shared;

use Rosebud\Enums\GendersEnum;

final readonly class CrewMemberData
{
    public function __construct(
        public ?bool $adult,
        public ?GendersEnum $gender,
        public int $id,
        public ?string $known_for_department,
        public ?string $name,
        public ?string $original_name,
        public ?float $popularity,
        public ?string $profile_path,
        public string $credit_id,
        public ?string $department,
        public ?string $job
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            adult: $data['adult'] ?? null,
            gender: $data['gender'] ?? null ? GendersEnum::fromInt((int) $data['gender']) : null,
            id: $data['id'],
            known_for_department: $data['known_for_department'] ?? null,
            name: $data['name'] ?? null,
            original_name: $data['original_name'] ?? null,
            popularity: $data['popularity'] ?? null,
            profile_path: $data['profile_path'],
            credit_id: $data['credit_id'],
            department: $data['department'] ?? null,
            job: $data['job'] ?? null
        );
    }

    public function toArray(): array
    {
        return [
            'adult' => $this->adult,
            'gender' => $this->gender?->getName(),
            'id' => $this->id,
            'known_for_department' => $this->known_for_department,
            'name' => $this->name,
            'original_name' => $this->original_name,
            'popularity' => $this->popularity,
            'profile_path' => $this->profile_path,
            'credit_id' => $this->credit_id,
            'department' => $this->department,
            'job' => $this->job
        ];
    }
}