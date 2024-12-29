<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\TvSeries;

use Rosebud\DataTransferObjects\ComputedData;
use Rosebud\DataTransferObjects\Shared\GenreData;
use Rosebud\DataTransferObjects\Shared\ProductionCompanyData;
use Rosebud\DataTransferObjects\Shared\ProductionCountryData;
use Rosebud\DataTransferObjects\Shared\SpokenLanguageData;
use Rosebud\DataTransferObjects\Shared\TranslationsData;

final readonly class TvShowDetailsData
{
    public function __construct(
        public bool $adult,
        public ?string $backdrop_path,
        /** @var CreatedByData[] */
        public array $created_by,
        /** @var int[] */
        public array $episode_run_time,
        public string $first_air_date,
        /** @var GenreData[] */
        public array $genres,
        public string $homepage,
        public int $id,
        public bool $in_production,
        /** @var string[] */
        public array $languages,
        public string $last_air_date,
        public LastEpisodeToAir $last_episode_to_air,
        public string $name,
        public ?string $next_episode_to_air,
        /** @var NetworkData[] */
        public array $networks,
        public int $number_of_episodes,
        public int $number_of_seasons,
        /** @var string[] */
        public array $origin_country,
        public string $original_language,
        public string $original_name,
        public string $overview,
        public float $popularity,
        public ?string $poster_path,
        /** @var ProductionCompanyData[] */
        public array $production_companies,
        /** @var ProductionCountryData[] */
        public array $production_countries,
        /** @var SeasonData[] */
        public array $seasons,
        /** @var SpokenLanguageData[] */
        public array $spoken_languages,
        public string $status,
        public string $tagline,
        public string $type,
        public float $vote_average,
        public int $vote_count,
        public TranslationsData $translations,
        public ComputedData $computed
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            adult: $data['adult'],
            backdrop_path: $data['backdrop_path'],
            created_by: array_map(fn(array $created_by) => CreatedByData::fromArray($created_by), $data['created_by']),
            episode_run_time: $data['episode_run_time'],
            first_air_date: $data['first_air_date'],
            genres: array_map(fn(array $genre) => GenreData::fromArray($genre), $data['genres']),
            homepage: $data['homepage'],
            id: $data['id'],
            in_production: $data['in_production'],
            languages: $data['languages'],
            last_air_date: $data['last_air_date'],
            last_episode_to_air: LastEpisodeToAir::fromArray($data['last_episode_to_air']),
            name: $data['name'],
            next_episode_to_air: $data['next_episode_to_air'] ?? null,
            networks: array_map(fn(array $network) => NetworkData::fromArray($network), $data['networks']),
            number_of_episodes: $data['number_of_episodes'],
            number_of_seasons: $data['number_of_seasons'],
            origin_country: $data['origin_country'],
            original_language: $data['original_language'],
            original_name: $data['original_name'],
            overview: $data['overview'],
            popularity: $data['popularity'],
            poster_path: $data['poster_path'],
            production_companies: array_map(fn(array $company) => ProductionCompanyData::fromArray($company), $data['production_companies']),
            production_countries: array_map(fn(array $country) => ProductionCountryData::fromArray($country), $data['production_countries']),
            seasons: array_map(fn(array $season) => SeasonData::fromArray($season), $data['seasons']),
            spoken_languages: array_map(fn(array $language) => SpokenLanguageData::fromArray($language), $data['spoken_languages']),
            status: $data['status'],
            tagline: $data['tagline'],
            type: $data['type'],
            vote_average: $data['vote_average'],
            vote_count: $data['vote_count'],
            translations: TranslationsData::fromArray($data['translations']),
            computed: ComputedData::fromArray($data),
        );
    }

    public function toArray(): array
    {
        return [
            'adult' => $this->adult,
            'backdrop_path' => $this->backdrop_path,
            'created_by' => array_map(fn(CreatedByData $created_by) => $created_by->toArray(), $this->created_by),
            'episode_run_time' => $this->episode_run_time,
            'first_air_date' => $this->first_air_date,
            'genres' => array_map(fn(GenreData $genre) => $genre->toArray(), $this->genres),
            'homepage' => $this->homepage,
            'id' => $this->id,
            'in_production' => $this->in_production,
            'languages' => $this->languages,
            'last_air_date' => $this->last_air_date,
            'last_episode_to_air' => $this->last_episode_to_air->toArray(),
            'name' => $this->name,
            'next_episode_to_air' => $this->next_episode_to_air,
            'networks' => array_map(fn(NetworkData $network) => $network->toArray(), $this->networks),
            'number_of_episodes' => $this->number_of_episodes,
            'number_of_seasons' => $this->number_of_seasons,
            'origin_country' => $this->origin_country,
            'original_language' => $this->original_language,
            'original_name' => $this->original_name,
            'overview' => $this->overview,
            'popularity' => $this->popularity,
            'poster_path' => $this->poster_path,
            'production_companies' => array_map(fn(ProductionCompanyData $company) => $company->toArray(), $this->production_companies),
            'production_countries' => array_map(fn(ProductionCountryData $country) => $country->toArray(), $this->production_countries),
            'seasons' => array_map(fn(SeasonData $season) => $season->toArray(), $this->seasons),
            'spoken_languages' => array_map(fn(SpokenLanguageData $language) => $language->toArray(), $this->spoken_languages),
            'status' => $this->status,
            'tagline' => $this->tagline,
            'type' => $this->type,
            'vote_average' => $this->vote_average,
            'vote_count' => $this->vote_count,
            'translations' => $this->translations->toArray(),
            'computed' => $this->computed->toArray(),
        ];
    }
}