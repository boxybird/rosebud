<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\TvSeries;

use Rosebud\DataTransferObjects\ComputedData;

final readonly class SimilarTvShowData
{
    public function __construct(
        public bool $adult,
        public ?string $backdrop_path,
        /** @var int[] */
        public array $genre_ids,
        public int $id,
        /** @var string[] */
        public array $origin_country,
        public string $original_language,
        public string $original_name,
        public string $overview,
        public float $popularity,
        public ?string $poster_path,
        public string $first_air_date,
        public string $name,
        public float $vote_average,
        public int $vote_count,
        public ComputedData $computed
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            adult: $data['adult'],
            backdrop_path: $data['backdrop_path'],
            genre_ids: $data['genre_ids'],
            id: $data['id'],
            origin_country: $data['origin_country'],
            original_language: $data['original_language'],
            original_name: $data['original_name'],
            overview: $data['overview'],
            popularity: $data['popularity'],
            poster_path: $data['poster_path'],
            first_air_date: $data['first_air_date'],
            name: $data['name'],
            vote_average: $data['vote_average'],
            vote_count: $data['vote_count'],
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
            'origin_country' => $this->origin_country,
            'original_language' => $this->original_language,
            'original_name' => $this->original_name,
            'overview' => $this->overview,
            'popularity' => $this->popularity,
            'poster_path' => $this->poster_path,
            'first_air_date' => $this->first_air_date,
            'name' => $this->name,
            'vote_average' => $this->vote_average,
            'vote_count' => $this->vote_count,
            'computed' => $this->computed->toArray(),
        ];
    }
}