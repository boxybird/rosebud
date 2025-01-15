<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\TvEpisodes;

use Rosebud\DataTransferObjects\Shared\CrewMemberData;
use Rosebud\DataTransferObjects\Shared\TranslationsData;
use Rosebud\DataTransferObjects\Shared\VideoData;

final readonly class TvEpisodeDetailsData
{
    public function __construct(
        public ?string $air_date,
        /** @var CrewMemberData[] */
        public ?array $crew,
        public ?int $episode_number,
        /** @var CrewMemberData[] */
        public ?array $guest_stars,
        public ?string $name,
        public ?string $overview,
        public int $id,
        public ?string $imdb_id,
        public ?string $production_code,
        public ?int $runtime,
        public ?int $season_number,
        public ?string $still_path,
        public ?float $vote_average,
        public ?int $vote_count,
        public ?array $credits,
        public ?array $external_ids,
        public ?array $images,
        public ?TranslationsData $translations,
        /** @var VideoData[] */
        public ?array $videos
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            air_date: $data['air_date'] ?? null,
            crew: isset($data['crew']) ? array_map(fn(array $crew): CrewMemberData => CrewMemberData::fromArray($crew), $data['crew']) : null,
            episode_number: $data['episode_number'] ?? null,
            guest_stars: isset($data['guest_stars']) ? array_map(fn(array $guest): CrewMemberData => CrewMemberData::fromArray($guest), $data['guest_stars']) : null,
            name: $data['name'] ?? null,
            overview: $data['overview'] ?? null,
            id: $data['id'],
            imdb_id: $data['external_ids']['imdb_id'] ?? null,
            production_code: $data['production_code'] ?? null,
            runtime: $data['runtime'] ?? null,
            season_number: $data['season_number'] ?? null,
            still_path: $data['still_path'] ?? null,
            vote_average: $data['vote_average'] ?? null,
            vote_count: $data['vote_count'] ?? null,
            credits: $data['credits'] ?? null,
            external_ids: $data['external_ids'] ?? null,
            images: $data['images'] ?? null,
            translations: isset($data['translations']) ? TranslationsData::fromArray($data['translations']) : null,
            videos: isset($data['videos']['results']) ? array_map(fn(array $video): VideoData => VideoData::fromArray($video), $data['videos']['results']) : null
        );
    }

    public function toArray(): array
    {
        return [
            'air_date' => $this->air_date,
            'crew' => $this->crew ? array_map(fn(CrewMemberData $crew): array => $crew->toArray(), $this->crew) : null,
            'episode_number' => $this->episode_number,
            'guest_stars' => $this->guest_stars ? array_map(fn(CrewMemberData $guest): array => $guest->toArray(), $this->guest_stars) : null,
            'name' => $this->name,
            'overview' => $this->overview,
            'id' => $this->id,
            'imdb_id' => $this->imdb_id,
            'production_code' => $this->production_code,
            'runtime' => $this->runtime,
            'season_number' => $this->season_number,
            'still_path' => $this->still_path,
            'vote_average' => $this->vote_average,
            'vote_count' => $this->vote_count,
            'credits' => $this->credits,
            'external_ids' => $this->external_ids,
            'images' => $this->images,
            'translations' => $this->translations?->toArray(),
            'videos' => $this->videos ? array_map(fn(VideoData $video): array => $video->toArray(), $this->videos) : null
        ];
    }
}