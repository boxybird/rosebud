<?php

namespace Rosebud\DataTransferObjects\TvSeries;

use Rosebud\DataTransferObjects\ComputedData;

final readonly class SeasonData
{
    public function __construct(
        public ?string $air_date,
        public int $episode_count,
        public int $id,
        public string $name,
        public string $overview,
        public ?string $poster_path,
        public int $season_number,
        public int|float $vote_average,
        public ComputedData $computed
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            air_date: $data['air_date'] ?? null,
            episode_count: $data['episode_count'],
            id: $data['id'],
            name: $data['name'],
            overview: $data['overview'],
            poster_path: $data['poster_path'] ?? null,
            season_number: $data['season_number'],
            vote_average: $data['vote_average'],
            computed: ComputedData::fromArray($data),
        );
    }

    public function toArray(): array
    {
        return [
            'air_date' => $this->air_date,
            'episode_count' => $this->episode_count,
            'id' => $this->id,
            'name' => $this->name,
            'overview' => $this->overview,
            'poster_path' => $this->poster_path,
            'season_number' => $this->season_number,
            'vote_average' => $this->vote_average,
            'computed' => $this->computed->toArray(),
        ];
    }
}