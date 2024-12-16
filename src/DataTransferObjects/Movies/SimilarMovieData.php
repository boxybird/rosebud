<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Movies;

final readonly class SimilarMovieData
{
    public function __construct(
        public bool $adult,
        public string|null $backdrop_path,
        /** @var int[] */
        public array $genre_ids,
        public int $id,
        public string $original_language,
        public string $original_title,
        public string $overview,
        public float $popularity,
        public string|null $poster_path,
        public string $release_date,
        public string $title,
        public bool $video,
        public float $vote_average,
        public int $vote_count,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            adult: $data['adult'],
            backdrop_path: $data['backdrop_path'],
            genre_ids: $data['genre_ids'],
            id: $data['id'],
            original_language: $data['original_language'],
            original_title: $data['original_title'],
            overview: $data['overview'],
            popularity: $data['popularity'],
            poster_path: $data['poster_path'],
            release_date: $data['release_date'],
            title: $data['title'],
            video: $data['video'],
            vote_average: $data['vote_average'],
            vote_count: $data['vote_count'],
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
        ];
    }
}