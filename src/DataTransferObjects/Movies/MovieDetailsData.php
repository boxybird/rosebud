<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Movies;

use Rosebud\DataTransferObjects\ComputedData;
use Rosebud\DataTransferObjects\Shared\AlternativeTitlesData;
use Rosebud\DataTransferObjects\Shared\CreditsData;
use Rosebud\DataTransferObjects\Shared\ExternalIdsData;
use Rosebud\DataTransferObjects\Shared\GenreData;
use Rosebud\DataTransferObjects\Shared\KeywordsData;
use Rosebud\DataTransferObjects\Shared\ProductionCompanyData;
use Rosebud\DataTransferObjects\Shared\ProductionCountryData;
use Rosebud\DataTransferObjects\Shared\SpokenLanguageData;
use Rosebud\DataTransferObjects\Shared\TranslationsData;

final readonly class MovieDetailsData
{
    public function __construct(
        public ?bool $adult,
        public ?string $backdrop_path,
        public ?array $belongs_to_collection,
        public ?int $budget,
        /** @var GenreData[] */
        public ?array $genres,
        public ?string $homepage,
        public int $id,
        public ?string $imdb_id,
        public ?array $origin_country,
        public ?string $original_language,
        public ?string $original_title,
        public ?string $overview,
        public ?float $popularity,
        public ?string $poster_path,
        /** @var ProductionCompanyData[] */
        public ?array $production_companies,
        /** @var ProductionCountryData[] */
        public ?array $production_countries,
        public ?string $release_date,
        public ?int $revenue,
        public ?int $runtime,
        /** @var SpokenLanguageData[] */
        public ?array $spoken_languages,
        public ?string $status,
        public ?string $tagline,
        public ?string $title,
        public ?bool $video,
        public ?float $vote_average,
        public ?int $vote_count,
        public ?AlternativeTitlesData $alternative_titles,
        public ?CreditsData $credits,
        public ?ExternalIdsData $external_ids,
        public ?ImagesData $images,
        public ?KeywordsData $keywords,
        public ?RecommendationsData $recommendations,
        public ?ReleaseDatesData $release_dates,
        public ?ReviewsData $reviews,
        public ?SimilarMoviesData $similar,
        public ?ReleasesData $releases,
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
            belongs_to_collection: $data['belongs_to_collection'] ?? null,
            budget: $data['budget'] ?? null,
            genres: $data['genres'] ?? null ? array_map(fn(array $genre) => GenreData::fromArray($genre), $data['genres']) : null,
            homepage: $data['homepage'] ?? null,
            id: $data['id'],
            imdb_id: $data['imdb_id'] ?? null,
            origin_country: $data['origin_country'] ?? null,
            original_language: $data['original_language'] ?? null,
            original_title: $data['original_title'] ?? null,
            overview: $data['overview'] ?? null,
            popularity: $data['popularity'] ?? null,
            poster_path: $data['poster_path'] ?? null,
            production_companies: $data['production_companies'] ?? null ? array_map(fn(array $company) => ProductionCompanyData::fromArray($company), $data['production_companies']) : null,
            production_countries: $data['production_countries'] ?? null ? array_map(fn(array $country) => ProductionCountryData::fromArray($country), $data['production_countries']) : null,
            release_date: $data['release_date'] ?? null,
            revenue: $data['revenue'] ?? null,
            runtime: $data['runtime'] ?? null,
            spoken_languages: $data['spoken_languages'] ?? null ? array_map(fn(array $language) => SpokenLanguageData::fromArray($language), $data['spoken_languages']) : null,
            status: $data['status'] ?? null,
            tagline: $data['tagline'] ?? null,
            title: $data['title'] ?? null,
            video: $data['video'] ?? null,
            vote_average: $data['vote_average'] ?? null,
            vote_count: $data['vote_count'] ?? null,
            alternative_titles: $data['alternative_titles'] ?? null ? AlternativeTitlesData::fromArray($data['alternative_titles']) : null,
            credits: $data['credits'] ?? null ? CreditsData::fromArray($data['credits']) : null,
            external_ids: $data['external_ids'] ?? null ? ExternalIdsData::fromArray($data['external_ids']) : null,
            images: $data['images'] ?? null ? ImagesData::fromArray($data['images']) : null,
            keywords: $data['keywords'] ?? null ? KeywordsData::fromArray($data['keywords']) : null,
            recommendations: $data['recommendations'] ?? null ? RecommendationsData::fromArray($data['recommendations']) : null,
            release_dates: $data['release_dates'] ?? null ? ReleaseDatesData::fromArray($data['release_dates']) : null,
            reviews: $data['reviews'] ?? null ? ReviewsData::fromArray($data['reviews']) : null,
            similar: $data['similar'] ?? null ? SimilarMoviesData::fromArray($data['similar']) : null,
            releases: $data['releases'] ?? null ? ReleasesData::fromArray($data['releases']) : null,
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
            'belongs_to_collection' => $this->belongs_to_collection,
            'budget' => $this->budget,
            'genres' => $this->genres ? array_map(fn(GenreData $genre) => $genre->toArray(), $this->genres) : null,
            'homepage' => $this->homepage,
            'id' => $this->id,
            'imdb_id' => $this->imdb_id,
            'origin_country' => $this->origin_country,
            'original_language' => $this->original_language,
            'original_title' => $this->original_title,
            'overview' => $this->overview,
            'popularity' => $this->popularity,
            'poster_path' => $this->poster_path,
            'production_companies' => $this->production_companies ? array_map(fn(ProductionCompanyData $company) => $company->toArray(), $this->production_companies) : null,
            'production_countries' => $this->production_countries ? array_map(fn(ProductionCountryData $country) => $country->toArray(), $this->production_countries) : null,
            'release_date' => $this->release_date,
            'revenue' => $this->revenue,
            'runtime' => $this->runtime,
            'spoken_languages' => $this->spoken_languages ? array_map(fn(SpokenLanguageData $language) => $language->toArray(), $this->spoken_languages) : null,
            'status' => $this->status,
            'tagline' => $this->tagline,
            'title' => $this->title,
            'video' => $this->video,
            'vote_average' => $this->vote_average,
            'vote_count' => $this->vote_count,
            'alternative_titles' => $this->alternative_titles?->toArray(),
            'credits' => $this->credits?->toArray(),
            'external_ids' => $this->external_ids?->toArray(),
            'images' => $this->images?->toArray(),
            'keywords' => $this->keywords?->toArray(),
            'recommendations' => $this->recommendations?->toArray(),
            'release_dates' => $this->release_dates?->toArray(),
            'reviews' => $this->reviews?->toArray(),
            'similar' => $this->similar?->toArray(),
            'releases' => $this->releases?->toArray(),
            'translations' => $this->translations?->toArray(),
            'videos' => $this->videos?->toArray(),
            'computed' => $this->computed->toArray(),
        ];
    }
}