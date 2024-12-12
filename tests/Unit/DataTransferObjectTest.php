<?php

use Rosebud\DataTransferObjects\MovieData;

it('can create a data movie transfer object', function ($movie) {
    $movie = MovieData::fromArray($movie);

    expect($movie)->toBeInstanceOf(MovieData::class);
})->with('movies');