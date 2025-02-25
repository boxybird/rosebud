<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\TvSeries;

use Rosebud\DataTransferObjects\ComputedData;
use Rosebud\DataTransferObjects\Shared\AlternativeTitlesData;
use Rosebud\DataTransferObjects\Shared\CreditsData;
use Rosebud\DataTransferObjects\Shared\GenreData;
use Rosebud\DataTransferObjects\Shared\KeywordsData;
use Rosebud\DataTransferObjects\Shared\ProductionCompanyData;
use Rosebud\DataTransferObjects\Shared\ProductionCountryData;
use Rosebud\DataTransferObjects\Shared\SpokenLanguageData;
use Rosebud\DataTransferObjects\Shared\TranslationsData;
use Rosebud\DataTransferObjects\Shared\VideosData;

final readonly class TvShowDetailsData
{
    public function __construct(
        public ?bool $adult,
        public ?string $backdrop_path,
        /** @var CreatedByData[] */
        public ?array $created_by,
        /** @var int[] */
        public ?array $episode_run_time,
        public ?string $first_air_date,
        /** @var GenreData[] */
        public ?array $genres,
        public ?string $homepage,
        public int $id,
        public ?string $imdb_id,
        public ?bool $in_production,
        /** @var string[] */
        public ?array $languages,
        public ?string $last_air_date,
        public ?LastEpisodeToAirData $last_episode_to_air,
        public ?string $name,
        public ?NextEpisodeToAirData $next_episode_to_air,
        /** @var NetworkData[] */
        public ?array $networks,
        public ?int $number_of_episodes,
        public ?int $number_of_seasons,
        /** @var string[] */
        public ?array $origin_country,
        public ?string $original_language,
        public ?string $original_name,
        public ?string $overview,
        public ?float $popularity,
        public ?string $poster_path,
        /** @var ProductionCompanyData[] */
        public ?array $production_companies,
        /** @var ProductionCountryData[] */
        public ?array $production_countries,
        /** @var SeasonData[] */
        public ?array $seasons,
        /** @var SpokenLanguageData[] */
        public ?array $spoken_languages,
        public ?string $status,
        public ?string $tagline,
        public ?string $type,
        public ?float $vote_average,
        public ?int $vote_count,
        public ?AlternativeTitlesData $alternative_titles,
        public ?CreditsData $credits,
        public ?KeywordsData $keywords,
        public ?RecommendationsData $recommendations,
        public ?SimilarTvShowsData $similar,
        public ?TranslationsData $translations,
        public ?VideosData $videos,
        public ?ComputedData $computed
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            adult: $data['adult'] ?? null,
            backdrop_path: $data['backdrop_path'] ?? null,
            created_by: $data['created_by'] ?? null ? array_map(fn(array $created_by): CreatedByData => CreatedByData::fromArray($created_by), $data['created_by']) : null,
            episode_run_time: $data['episode_run_time'] ?? null,
            first_air_date: $data['first_air_date'] ?? null,
            genres: $data['genres'] ?? null ? array_map(fn(array $genre): GenreData => GenreData::fromArray($genre), $data['genres']) : null,
            homepage: $data['homepage'] ?? null,
            id: $data['id'] ?? null,
            imdb_id: $data['external_ids']['imdb_id'] ?? null,
            in_production: $data['in_production'] ?? null,
            languages: $data['languages'] ?? null,
            last_air_date: $data['last_air_date'] ?? null,
            last_episode_to_air: $data['last_episode_to_air'] ?? null ? LastEpisodeToAirData::fromArray($data['last_episode_to_air']) : null,
            name: $data['name'] ?? null,
            next_episode_to_air: $data['next_episode_to_air'] ?? null ? NextEpisodeToAirData::fromArray($data['next_episode_to_air']) : null,
            networks: $data['networks'] ?? null ? array_map(fn(array $network): NetworkData => NetworkData::fromArray($network), $data['networks']) : null,
            number_of_episodes: $data['number_of_episodes'] ?? null,
            number_of_seasons: $data['number_of_seasons'] ?? null,
            origin_country: $data['origin_country'] ?? null,
            original_language: $data['original_language'] ?? null,
            original_name: $data['original_name'] ?? null,
            overview: $data['overview'] ?? null,
            popularity: $data['popularity'] ?? null,
            poster_path: $data['poster_path'] ?? null,
            production_companies: $data['production_companies'] ?? null ? array_map(fn(array $company): ProductionCompanyData => ProductionCompanyData::fromArray($company),
                $data['production_companies']) : null,
            production_countries: $data['production_countries'] ?? null ? array_map(fn(array $country): ProductionCountryData => ProductionCountryData::fromArray($country),
                $data['production_countries']) : null,
            seasons: $data['seasons'] ?? null ? array_map(fn(array $season): SeasonData => SeasonData::fromArray($season), $data['seasons']) : null,
            spoken_languages: $data['spoken_languages'] ?? null ? array_map(fn(array $language): SpokenLanguageData => SpokenLanguageData::fromArray($language), $data['spoken_languages']) : null,
            status: $data['status'] ?? null,
            tagline: $data['tagline'] ?? null,
            type: $data['type'] ?? null,
            vote_average: $data['vote_average'] ?? null,
            vote_count: $data['vote_count'] ?? null,
            alternative_titles: $data['alternative_titles'] ?? null ? AlternativeTitlesData::fromArray($data['alternative_titles']) : null,
            credits: $data['credits'] ?? null ? CreditsData::fromArray($data['credits']) : null,
            keywords: $data['keywords'] ?? null ? KeywordsData::fromArray($data['keywords']) : null,
            recommendations: $data['recommendations'] ?? null ? RecommendationsData::fromArray($data['recommendations']) : null,
            similar: $data['similar'] ?? null ? SimilarTvShowsData::fromArray($data['similar']) : null,
            translations: $data['translations'] ?? null ? TranslationsData::fromArray($data['translations']) : null,
            videos: $data['videos'] ?? null ? VideosData::fromArray($data['videos']) : null,
            computed: ComputedData::fromArray($data),
        );
    }

    public function toArray(): array
    {
        return [
            'adult' => $this->adult,
            'backdrop_path' => $this->backdrop_path,
            'created_by' => $this->created_by ? array_map(fn(CreatedByData $created_by): array => $created_by->toArray(), $this->created_by) : null,
            'episode_run_time' => $this->episode_run_time,
            'first_air_date' => $this->first_air_date,
            'genres' => $this->genres ? array_map(fn(GenreData $genre): array => $genre->toArray(), $this->genres) : null,
            'homepage' => $this->homepage,
            'id' => $this->id,
            'imdb_id' => $this->imdb_id,
            'in_production' => $this->in_production,
            'languages' => $this->languages,
            'last_air_date' => $this->last_air_date,
            'last_episode_to_air' => $this->last_episode_to_air?->toArray(),
            'name' => $this->name,
            'next_episode_to_air' => $this->next_episode_to_air,
            'networks' => $this->networks ? array_map(fn(NetworkData $network): array => $network->toArray(), $this->networks) : null,
            'number_of_episodes' => $this->number_of_episodes,
            'number_of_seasons' => $this->number_of_seasons,
            'origin_country' => $this->origin_country,
            'original_language' => $this->original_language,
            'original_name' => $this->original_name,
            'overview' => $this->overview,
            'popularity' => $this->popularity,
            'poster_path' => $this->poster_path,
            'production_companies' => $this->production_companies ? array_map(fn(ProductionCompanyData $company): array => $company->toArray(), $this->production_companies) : null,
            'production_countries' => $this->production_countries ? array_map(fn(ProductionCountryData $country): array => $country->toArray(), $this->production_countries) : null,
            'seasons' => $this->seasons ? array_map(fn(SeasonData $season): array => $season->toArray(), $this->seasons) : null,
            'spoken_languages' => $this->spoken_languages ? array_map(fn(SpokenLanguageData $language): array => $language->toArray(), $this->spoken_languages) : null,
            'status' => $this->status,
            'tagline' => $this->tagline,
            'type' => $this->type,
            'vote_average' => $this->vote_average,
            'vote_count' => $this->vote_count,
            'alternative_titles' => $this->alternative_titles?->toArray(),
            'credits' => $this->credits?->toArray(),
            'keywords' => $this->keywords?->toArray(),
            'recommendations' => $this->recommendations?->toArray(),
            'similar' => $this->similar?->toArray(),
            'translations' => $this->translations?->toArray(),
            'videos' => $this->videos?->toArray(),
            'computed' => $this->computed->toArray(),
        ];
    }
}