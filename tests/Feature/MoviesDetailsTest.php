<?php

use Rosebud\DataTransferObjects\MovieDetailData;
use Rosebud\Tmdb;

it('can get movie details', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $movie = (new Tmdb(api_key: $api_key))->movieDetails(924); // Dawn of the Dead (2004)

    expect($movie)->toBeInstanceOf(MovieDetailData::class);
});
