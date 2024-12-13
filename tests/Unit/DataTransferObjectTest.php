<?php

use Rosebud\DataTransferObjects\MovieData;
use Rosebud\DataTransferObjects\TvData;

it('can create a movie data transfer object', function (array $movie) {
    $movie = MovieData::fromArray($movie);

    expect($movie)->toBeInstanceOf(MovieData::class);
})->with('movies');

it('can create a tv data transfer object', function (array $tv_show) {
    $tv_show = TvData::fromArray($tv_show);

    expect($tv_show)->toBeInstanceOf(TvData::class);
})->with('tv shows');
