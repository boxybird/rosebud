<?php

use Rosebud\DataTransferObjects\Movies\MovieData;
use Rosebud\DataTransferObjects\Movies\MovieDetailsData;
use Rosebud\DataTransferObjects\Movies\MovieListData;
use Rosebud\Movie;

it('finds movie by imdb id', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $movie = (new Movie(api_key: $api_key))->find('tt0137523', raw: true); // Fight Club

    expect($movie)
        ->toBeArray()
        ->and($movie['title'])->toBe('Fight Club');
});

it('finds movie by imdb id and return dto', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $movie = (new Movie(api_key: $api_key))->find('tt0137523'); // Fight Club

    expect($movie)
        ->toBeInstanceOf(MovieData::class)
        ->and($movie->title)->toBe('Fight Club');
});

it('can get movie details', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $movie = (new Movie(api_key: $api_key))->details(924, raw: true); // Dawn of the Dead (2004)

    expect($movie)
        ->toBeArray()
        ->and($movie['title'])->toBe('Dawn of the Dead');
});


it('can get movie details and return dto', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $movie = (new Movie(api_key: $api_key))->details(924); // Dawn of the Dead (2004)

    expect($movie)
        ->toBeInstanceOf(MovieDetailsData::class);
});

it('can get popular movies', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $movies = (new Movie(api_key: $api_key))->popular(raw: true);

    expect($movies)
        ->toBeArray();
});


it('can get popular movies and return dto', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $movies = (new Movie(api_key: $api_key))->popular();

    expect($movies)
        ->toBeInstanceOf(MovieListData::class);
});

it('can search for movies', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $movies = (new Movie(api_key: $api_key))->search('zombie', raw: true);

    expect($movies)
        ->toBeArray();
});

it('can search for movies and return dto', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $movies = (new Movie(api_key: $api_key))->search('zombie');

    expect($movies)
        ->toBeInstanceOf(MovieListData::class);
});


