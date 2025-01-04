<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\People;

use Rosebud\DataTransferObjects\ComputedData;
use Rosebud\DataTransferObjects\Shared\ExternalIdsData;
use Rosebud\DataTransferObjects\Shared\ImagesData;
use Rosebud\DataTransferObjects\Shared\TranslationsData;
use Rosebud\Enums\GendersEnum;

final readonly class PersonDetailsData
{
    public function __construct(
        public ?bool $adult,
        /** @var string[] */
        public ?array $also_known_as,
        public ?string $biography,
        public ?string $birthday,
        public ?string $deathday,
        public ?GendersEnum $gender,
        public ?string $homepage,
        public int $id,
        public ?string $imdb_id,
        public ?string $known_for_department,
        public ?string $name,
        public ?string $place_of_birth,
        public ?float $popularity,
        public ?string $profile_path,
        public ?CombinedCreditsData $combined_credits,
        public ?ExternalIdsData $external_ids,
        public ?ImagesData $images,
        public ?TranslationsData $translations,
        public ComputedData $computed

    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            adult: $data['adult'] ?? null,
            also_known_as: $data['also_known_as'] ?? null,
            biography: $data['biography'] ?? null,
            birthday: $data['birthday'] ?? null,
            deathday: $data['deathday'] ?? null,
            gender: $data['gender'] ?? null ? GendersEnum::fromInt($data['gender']) : null,
            homepage: $data['homepage'] ?? null,
            id: $data['id'],
            imdb_id: $data['imdb_id'] ?? null,
            known_for_department: $data['known_for_department'] ?? null,
            name: $data['name'] ?? null,
            place_of_birth: $data['place_of_birth'] ?? null,
            popularity: $data['popularity'] ?? null,
            profile_path: $data['profile_path'] ?? null,
            combined_credits: isset($data['combined_credits']) ? CombinedCreditsData::fromArray($data['combined_credits']) : null,
            external_ids: isset($data['external_ids']) ? ExternalIdsData::fromArray($data['external_ids']) : null,
            images: isset($data['images']) ? ImagesData::fromArray($data['images']) : null,
            translations: isset($data['translations']) ? TranslationsData::fromArray($data['translations']) : null,
            computed: ComputedData::fromArray($data),
        );
    }

    public function toArray(): array
    {
        return [
            'adult' => $this->adult,
            'also_known_as' => $this->also_known_as,
            'biography' => $this->biography,
            'birthday' => $this->birthday,
            'deathday' => $this->deathday,
            'gender' => $this->gender?->getName(),
            'homepage' => $this->homepage,
            'id' => $this->id,
            'imdb_id' => $this->imdb_id,
            'known_for_department' => $this->known_for_department,
            'name' => $this->name,
            'place_of_birth' => $this->place_of_birth,
            'popularity' => $this->popularity,
            'profile_path' => $this->profile_path,
            'combined_credits' => $this->combined_credits?->toArray(),
            'external_ids' => $this->external_ids?->toArray(),
            'images' => $this->images?->toArray(),
            'translations' => $this->translations?->toArray(),
            'computed' => $this->computed->toArray(),
        ];
    }
}