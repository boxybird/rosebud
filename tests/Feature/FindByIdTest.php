<?php

use Rosebud\DataTransferObjects\MovieData;
use Rosebud\DataTransferObjects\PersonData;
use Rosebud\DataTransferObjects\TvData;
use Rosebud\DataTransferObjects\TvEpisodeData;
use Rosebud\Tmdb;

it('finds movie by imdb id', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $movie = (new Tmdb(api_key: $api_key))->findByImdbId('tt0137523'); // Fight Club

    expect($movie)->toBeInstanceOf(MovieData::class);
});

it('finds person by imdb id', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $person = (new Tmdb(api_key: $api_key))->findByImdbId('nm0000093'); // Brad Pitt

    expect($person)->toBeInstanceOf(PersonData::class);
});

it('finds tv show by imdb id', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $tv = (new Tmdb(api_key: $api_key))->findByImdbId('tt0903747'); // Breaking Bad

    expect($tv)->toBeInstanceOf(TvData::class);
});

it('finds tv episode by imdb id', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $tv = (new Tmdb(api_key: $api_key))->findByImdbId('tt0697679'); // Seinfeld - The Contest Episode

    expect($tv)->toBeInstanceOf(TvEpisodeData::class);
});
