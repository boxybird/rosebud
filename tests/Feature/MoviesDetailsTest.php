<?php

use Rosebud\DataTransferObjects\MovieDetailData;
use Rosebud\Tmdb;

it('can get movie details', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $movie = (new Tmdb(api_key: $api_key))->movieDetails(550); // Fight Club

    expect($movie)->toBeInstanceOf(MovieDetailData::class);
});
