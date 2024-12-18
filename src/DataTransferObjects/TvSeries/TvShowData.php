<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\TvSeries;

use Rosebud\DataTransferObjects\ComputedData;
use Rosebud\Enums\MediaTypesEnum;

final readonly class TvShowData
{
    public function __construct(
        public string $backdrop_path,
        public int $id,
        public string $name,
        public string $original_name,
        public string $overview,
        public string $poster_path,
        public ?MediaTypesEnum $media_type,
        public bool $adult,
        public string $original_language,
        /** @var int[] */
        public array $genre_ids,
        public float $popularity,
        public string $first_air_date,
        public float $vote_average,
        public int $vote_count,
        public array $origin_country,
        public ComputedData $computed
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            backdrop_path: $data['backdrop_path'],
            id: $data['id'],
            name: $data['name'],
            original_name: $data['original_name'],
            overview: $data['overview'],
            poster_path: $data['poster_path'],
            media_type: $data['media_type'] ?? null ? MediaTypesEnum::from($data['media_type']) : null,
            adult: $data['adult'],
            original_language: $data['original_language'],
            genre_ids: $data['genre_ids'],
            popularity: $data['popularity'],
            first_air_date: $data['first_air_date'],
            vote_average: $data['vote_average'],
            vote_count: $data['vote_count'],
            origin_country: $data['origin_country'],
            computed: ComputedData::fromArray($data),
        );
    }

    public function toArray(): array
    {
        return [
            'backdrop_path' => $this->backdrop_path,
            'id' => $this->id,
            'name' => $this->name,
            'original_name' => $this->original_name,
            'overview' => $this->overview,
            'poster_path' => $this->poster_path,
            'media_type' => $this->media_type?->value,
            'adult' => $this->adult,
            'original_language' => $this->original_language,
            'genre_ids' => $this->genre_ids,
            'popularity' => $this->popularity,
            'first_air_date' => $this->first_air_date,
            'vote_average' => $this->vote_average,
            'vote_count' => $this->vote_count,
            'origin_country' => $this->origin_country,
            'computed' => $this->computed->toArray(),
        ];
    }
}