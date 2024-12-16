<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects;

final readonly class MovieDetailData
{
    public function __construct(
        public bool $adult,
        public string $backdrop_path,
        public ?array $belongs_to_collection,
        public int $budget,
        /** @var GenreData[] */
        public array $genres,
        public string $homepage,
        public int $id,
        public string $imdb_id,
        public array $origin_country,
        public string $original_language,
        public string $original_title,
        public string $overview,
        public float $popularity,
        public string $poster_path,
        /** @var ProductionCompanyData[] */
        public array $production_companies,
        /** @var ProductionCountryData[] */
        public array $production_countries,
        public string $release_date,
        public int $revenue,
        public int $runtime,
        /** @var SpokenLanguageData[] */
        public array $spoken_languages,
        public string $status,
        public string $tagline,
        public string $title,
        public bool $video,
        public float $vote_average,
        public int $vote_count,
        public KeywordsData $keywords,
        public AlternativeTitlesData $alternative_titles,
        public CreditsData $credits,
        public ImagesData $images,
        public ReleasesData $releases,
        public VideosData $videos,
        public SimilarMoviesData $similar,
        public ReviewsData $reviews,
        public ComputedData $computed
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            adult: $data['adult'],
            backdrop_path: $data['backdrop_path'],
            belongs_to_collection: $data['belongs_to_collection'],
            budget: $data['budget'],
            genres: array_map(fn(array $genre) => GenreData::fromArray($genre), $data['genres']),
            homepage: $data['homepage'],
            id: $data['id'],
            imdb_id: $data['imdb_id'],
            origin_country: $data['origin_country'],
            original_language: $data['original_language'],
            original_title: $data['original_title'],
            overview: $data['overview'],
            popularity: $data['popularity'],
            poster_path: $data['poster_path'],
            production_companies: array_map(fn(array $company) => ProductionCompanyData::fromArray($company), $data['production_companies']),
            production_countries: array_map(fn(array $country) => ProductionCountryData::fromArray($country), $data['production_countries']),
            release_date: $data['release_date'],
            revenue: $data['revenue'],
            runtime: $data['runtime'],
            spoken_languages: array_map(fn(array $language) => SpokenLanguageData::fromArray($language), $data['spoken_languages']),
            status: $data['status'],
            tagline: $data['tagline'],
            title: $data['title'],
            video: $data['video'],
            vote_average: $data['vote_average'],
            vote_count: $data['vote_count'],
            keywords: KeywordsData::fromArray($data['keywords']),
            alternative_titles: AlternativeTitlesData::fromArray($data['alternative_titles']),
            credits: CreditsData::fromArray($data['credits']),
            images: ImagesData::fromArray($data['images']),
            releases: ReleasesData::fromArray($data['releases']),
            videos: VideosData::fromArray($data['videos']),
            similar: SimilarMoviesData::fromArray($data['similar']),
            reviews: ReviewsData::fromArray($data['reviews']),
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
            'genres' => array_map(fn(GenreData $genre) => $genre->toArray(), $this->genres),
            'homepage' => $this->homepage,
            'id' => $this->id,
            'imdb_id' => $this->imdb_id,
            'origin_country' => $this->origin_country,
            'original_language' => $this->original_language,
            'original_title' => $this->original_title,
            'overview' => $this->overview,
            'popularity' => $this->popularity,
            'poster_path' => $this->poster_path,
            'production_companies' => array_map(fn(ProductionCompanyData $company) => $company->toArray(), $this->production_companies),
            'production_countries' => array_map(fn(ProductionCountryData $country) => $country->toArray(), $this->production_countries),
            'release_date' => $this->release_date,
            'revenue' => $this->revenue,
            'runtime' => $this->runtime,
            'spoken_languages' => array_map(fn(SpokenLanguageData $language) => $language->toArray(), $this->spoken_languages),
            'status' => $this->status,
            'tagline' => $this->tagline,
            'title' => $this->title,
            'video' => $this->video,
            'vote_average' => $this->vote_average,
            'vote_count' => $this->vote_count,
            'keywords' => $this->keywords->toArray(),
            'titles' => $this->alternative_titles->toArray(),
            'credits' => $this->credits->toArray(),
            'images' => $this->images->toArray(),
            'releases' => $this->releases->toArray(),
            'videos' => $this->videos->toArray(),
            'similar' => $this->similar->toArray(),
            'reviews' => $this->reviews->toArray(),
            'computed' => $this->computed->toArray(),
        ];
    }
}