<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Movies;

use Rosebud\DataTransferObjects\ComputedData;
use Rosebud\Enums\MediaTypesEnum;

final readonly class MovieData
{
    public function __construct(
        public ?string $backdrop_path,
        public int $id,
        public string $title,
        public string $original_title,
        public string $overview,
        public ?string $poster_path,
        public ?MediaTypesEnum $media_type,
        public bool $adult,
        public string $original_language,
        /** @var int[] */
        public array $genre_ids,
        public float $popularity,
        public string $release_date,
        public bool $video,
        public float $vote_average,
        public int $vote_count,
        public ComputedData $computed
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            backdrop_path: $data['backdrop_path'],
            id: $data['id'],
            title: $data['title'],
            original_title: $data['original_title'],
            overview: $data['overview'],
            poster_path: $data['poster_path'],
            media_type: $data['media_type'] ?? null ? MediaTypesEnum::from($data['media_type']) : null,
            adult: $data['adult'],
            original_language: $data['original_language'],
            genre_ids: $data['genre_ids'],
            popularity: $data['popularity'],
            release_date: $data['release_date'],
            video: $data['video'],
            vote_average: $data['vote_average'],
            vote_count: $data['vote_count'],
            computed: ComputedData::fromArray($data),
        );
    }

    public function toArray(): array
    {
        return [
            'backdrop_path' => $this->backdrop_path,
            'id' => $this->id,
            'title' => $this->title,
            'original_title' => $this->original_title,
            'overview' => $this->overview,
            'poster_path' => $this->poster_path,
            'media_type' => $this->media_type?->value,
            'adult' => $this->adult,
            'original_language' => $this->original_language,
            'genre_ids' => $this->genre_ids,
            'popularity' => $this->popularity,
            'release_date' => $this->release_date,
            'video' => $this->video,
            'vote_average' => $this->vote_average,
            'vote_count' => $this->vote_count,
            'computed' => $this->computed->toArray(),
        ];
    }
}
