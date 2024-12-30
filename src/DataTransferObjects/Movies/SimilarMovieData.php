<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Movies;

use Rosebud\DataTransferObjects\ComputedData;

final readonly class SimilarMovieData
{
    public function __construct(
        public ?bool $adult,
        public ?string $backdrop_path,
        /** @var int[] */
        public ?array $genre_ids,
        public int $id,
        public ?string $original_language,
        public ?string $original_title,
        public ?string $overview,
        public ?float $popularity,
        public ?string $poster_path,
        public ?string $release_date,
        public ?string $title,
        public ?bool $video,
        public ?float $vote_average,
        public ?int $vote_count,
        public ComputedData $computed
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            adult: $data['adult'] ?? null,
            backdrop_path: $data['backdrop_path'] ?? null,
            genre_ids: $data['genre_ids'] ?? null,
            id: $data['id'],
            original_language: $data['original_language'] ?? null,
            original_title: $data['original_title'] ?? null,
            overview: $data['overview'] ?? null,
            popularity: $data['popularity'] ?? null,
            poster_path: $data['poster_path'] ?? null,
            release_date: $data['release_date'] ?? null,
            title: $data['title'] ?? null,
            video: $data['video'] ?? null,
            vote_average: $data['vote_average'] ?? null,
            vote_count: $data['vote_count'] ?? null,
            computed: ComputedData::fromArray($data),
        );
    }

    public function toArray(): array
    {
        return [
            'adult' => $this->adult,
            'backdrop_path' => $this->backdrop_path,
            'genre_ids' => $this->genre_ids,
            'id' => $this->id,
            'original_language' => $this->original_language,
            'original_title' => $this->original_title,
            'overview' => $this->overview,
            'popularity' => $this->popularity,
            'poster_path' => $this->poster_path,
            'release_date' => $this->release_date,
            'title' => $this->title,
            'video' => $this->video,
            'vote_average' => $this->vote_average,
            'vote_count' => $this->vote_count,
            'computed' => $this->computed->toArray(),
        ];
    }
}