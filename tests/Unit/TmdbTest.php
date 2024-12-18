<?php

use Rosebud\DataTransferObjects\Movies\MovieData;
use Rosebud\DataTransferObjects\People\PersonData;
use Rosebud\DataTransferObjects\TvEpisodes\TvEpisodeData;
use Rosebud\DataTransferObjects\TvSeries\TvShowData;
use Rosebud\Tmdb;

it('can search tmdb by external source id "imdb_id" and find a movie', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $movie = (new Tmdb(api_key: $api_key))->findByID('tt0137523'); // Fight Club

    expect($movie)
        ->toBeInstanceOf(MovieData::class)
        ->and($movie->title)->toBe('Fight Club');
});

it('can search tmdb by external source id "imdb_id" and find a tv show', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $tv_show = (new Tmdb(api_key: $api_key))->findByID('tt0903747');

    expect($tv_show)
        ->toBeInstanceOf(TvShowData::class)
        ->and($tv_show->name)->toBe('Breaking Bad');
});

it('can search tmdb by external source id "imdb_id" and find a tv episode', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $tv_episode = (new Tmdb(api_key: $api_key))->findByID('tt2301451'); // Breaking Bad - Ozymandias

    expect($tv_episode)
        ->toBeInstanceOf(TvEpisodeData::class)
        ->and($tv_episode->name)->toBe('Ozymandias');
});

it('can search tmdb by external source id "imdb_id" and find a person', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $person = (new Tmdb(api_key: $api_key))->findByID('nm0000093'); // Brad Pitt

    expect($person)
        ->toBeInstanceOf(PersonData::class)
        ->and($person->name)->toBe('Brad Pitt');
});
