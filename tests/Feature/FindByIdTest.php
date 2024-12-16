<?php

use Rosebud\DataTransferObjects\Movies\MovieData;
use Rosebud\DataTransferObjects\People\PersonData;
use Rosebud\DataTransferObjects\TvEpisodes\TvEpisodeData;
use Rosebud\DataTransferObjects\TvSeries\TvShowData;
use Rosebud\Enums\ExternalSourcesEnum;
use Rosebud\Movie;
use Rosebud\Person;
use Rosebud\TvEpisode;
use Rosebud\TvShow;

it('finds movie by imdb id', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $movie = (new Movie(api_key: $api_key))->find('tt0137523'); // Fight Club

    expect($movie)
        ->toBeInstanceOf(MovieData::class)
        ->and($movie->title)->toBe('Fight Club');
});

it('finds person by imdb id', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $person = (new Person(api_key: $api_key))->find('nm0000093'); // Brad Pitt

    expect($person)
        ->toBeInstanceOf(PersonData::class)
        ->and($person->name)->toBe('Brad Pitt');
});

it('finds tv show by imdb id', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $tv = (new TvShow(api_key: $api_key))->find('tt0903747'); // Breaking Bad

    expect($tv)
        ->toBeInstanceOf(TvShowData::class)
        ->and($tv->name)->toBe('Breaking Bad');
});

it('finds tv episode by imdb id', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $tv = (new TvEpisode(api_key: $api_key))->find('tt2301451'); // Breaking Bad - Ozymandias

    expect($tv)
        ->toBeInstanceOf(TvEpisodeData::class)
        ->and($tv->name)->toBe('Ozymandias');
});

it('finds tv show by tvdb id', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $tv_show = (new TvShow(api_key: $api_key))->find(81189, ExternalSourcesEnum::TVDB); // Breaking Bad

    expect($tv_show)
        ->toBeInstanceOf(TvShowData::class)
        ->and($tv_show->name)->toBe('Breaking Bad');
});
