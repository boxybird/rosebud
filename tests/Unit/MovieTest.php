<?php

use Rosebud\DataTransferObjects\MovieLists\Popular;
use Rosebud\DataTransferObjects\Movies\MovieData;
use Rosebud\DataTransferObjects\Movies\MovieDetailsData;
use Rosebud\Movie;

it('finds movie by imdb id', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $movie = (new Movie(api_key: $api_key))->find('tt0137523'); // Fight Club

    expect($movie)
        ->toBeInstanceOf(MovieData::class)
        ->and($movie->title)->toBe('Fight Club');
});

it('can get movie details', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $movie = (new Movie(api_key: $api_key))->details(924); // Dawn of the Dead (2004)

    expect($movie)->toBeInstanceOf(MovieDetailsData::class);
});


it('get popular movies', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $movies = (new Movie(api_key: $api_key))->popular();

    expect($movies)->toBeInstanceOf(Popular::class);
});
