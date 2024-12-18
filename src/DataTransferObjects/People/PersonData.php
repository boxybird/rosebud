<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\People;

use Rosebud\DataTransferObjects\ComputedData;
use Rosebud\DataTransferObjects\Movies\MovieData;
use Rosebud\Enums\MediaTypesEnum;

final readonly class PersonData
{
    public function __construct(
        public int $id,
        public string $name,
        public string $original_name,
        public ?MediaTypesEnum $media_type,
        public bool $adult,
        public float $popularity,
        public int $gender,
        public string $known_for_department,
        public string $profile_path,
        /** @var MovieData[] */
        public array $known_for,
        public ComputedData $computed
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
            original_name: $data['original_name'],
            media_type: $data['media_type'] ?? null ? MediaTypesEnum::from($data['media_type']) : null,
            adult: $data['adult'],
            popularity: $data['popularity'],
            gender: $data['gender'],
            known_for_department: $data['known_for_department'],
            profile_path: $data['profile_path'],
            known_for: array_map(fn(array $movie) => MovieData::fromArray($movie), $data['known_for']),
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
            'gender' => $this->gender,
            'known_for_department' => $this->known_for_department,
            'profile_path' => $this->profile_path,
            'known_for' => array_map(fn(MovieData $movie) => $movie->toArray(), $this->known_for),
            'computed' => $this->computed->toArray(),
        ];
    }
}