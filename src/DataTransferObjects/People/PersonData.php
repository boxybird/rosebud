<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\People;

use Rosebud\DataTransferObjects\ComputedData;
use Rosebud\DataTransferObjects\Movies\MovieData;
use Rosebud\Enums\GendersEnum;
use Rosebud\Enums\MediaTypesEnum;

final readonly class PersonData
{
    public function __construct(
        public int $id,
        public ?string $name,
        public ?string $original_name,
        public ?MediaTypesEnum $media_type,
        public ?bool $adult,
        public ?float $popularity,
        public ?GendersEnum $gender,
        public ?string $known_for_department,
        public ?string $profile_path,
        /** @var MovieData[] */
        public ?array $known_for,
        public ComputedData $computed
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            name: $data['name'] ?? null,
            original_name: $data['original_name'] ?? null,
            media_type: $data['media_type'] ?? null ? MediaTypesEnum::from($data['media_type']) : null,
            adult: $data['adult'] ?? null,
            popularity: $data['popularity'] ?? null,
            gender: $data['gender'] ?? null ? GendersEnum::fromInt((int) $data['gender']) : null,
            known_for_department: $data['known_for_department'] ?? null,
            profile_path: $data['profile_path'] ?? null,
            known_for: $data['known_for'] ?? null ? array_map(fn(array $movie) => MovieData::fromArray($movie), $data['known_for']) : null,
            computed: ComputedData::fromArray($data),
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'original_name' => $this->original_name,
            'media_type' => $this->media_type?->value,
            'adult' => $this->adult,
            'popularity' => $this->popularity,
            'gender' => $this->gender?->getName(),
            'known_for_department' => $this->known_for_department,
            'profile_path' => $this->profile_path,
            'known_for' => $this->known_for ? array_map(fn(MovieData $movie) => $movie->toArray(), $this->known_for) : null,
            'computed' => $this->computed->toArray(),
        ];
    }
}