<?php

use Rosebud\DataTransferObjects\MovieDetailData;
use Rosebud\Movie;

it('can get movie details', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $movie = (new Movie(api_key: $api_key))->details(924); // Dawn of the Dead (2004)

    expect($movie)->toBeInstanceOf(MovieDetailData::class);
});
