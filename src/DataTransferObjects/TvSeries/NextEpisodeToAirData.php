<?php

namespace Rosebud\DataTransferObjects\TvSeries;

use Rosebud\DataTransferObjects\ComputedData;

final readonly class NextEpisodeToAirData
{
    public function __construct(
        public int $id,
        public string $name,
        public string $overview,
        public float $vote_average,
        public int $vote_count,
        public string $air_date,
        public int $episode_number,
        public string $episode_type,
        public string $production_code,
        public ?int $runtime,
        public int $season_number,
        public int $show_id,
        public ?string $still_path,
        public ComputedData $computed,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
            overview: $data['overview'],
            vote_average: $data['vote_average'],
            vote_count: $data['vote_count'],
            air_date: $data['air_date'],
            episode_number: $data['episode_number'],
            episode_type: $data['episode_type'],
            production_code: $data['production_code'],
            runtime: $data['runtime'] ?? null,
            season_number: $data['season_number'],
            show_id: $data['show_id'],
            still_path: $data['still_path'] ?? null,
            computed: ComputedData::fromArray($data),
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'overview' => $this->overview,
            'vote_average' => $this->vote_average,
            'vote_count' => $this->vote_count,
            'air_date' => $this->air_date,
            'episode_number' => $this->episode_number,
            'episode_type' => $this->episode_type,
            'production_code' => $this->production_code,
            'runtime' => $this->runtime,
            'season_number' => $this->season_number,
            'show_id' => $this->show_id,
            'still_path' => $this->still_path,
            'computed' => $this->computed->toArray(),
        ];
    }
}