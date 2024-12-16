<?php

use Rosebud\DataTransferObjects\MovieData;
use Rosebud\DataTransferObjects\MovieDetailData;
use Rosebud\DataTransferObjects\PersonData;
use Rosebud\DataTransferObjects\TvEpisodeData;
use Rosebud\DataTransferObjects\TvShowData;

it('can create a movie data transfer object', function (array $movie) {
    $movie = MovieData::fromArray($movie);

    expect($movie)->toBeInstanceOf(MovieData::class);
})->with('movies');

it('can create a movie detail data transfer object', function (array $movie) {
    $movie = MovieDetailData::fromArray($movie);

    expect($movie)->toBeInstanceOf(MovieDetailData::class);
})->with('movie details');

it('can create a person data transfer object', function (array $person) {
    $person = PersonData::fromArray($person);

    expect($person)->toBeInstanceOf(PersonData::class);
})->with('people');

it('can create a tv data transfer object', function (array $tv_show) {
    $tv_show = TvShowData::fromArray($tv_show);

    expect($tv_show)->toBeInstanceOf(TvShowData::class);
})->with('tv shows');

it('can create a tv episode data transfer object', function (array $tv_episode) {
    $tv_episode = TvEpisodeData::fromArray($tv_episode);

    expect($tv_episode)->toBeInstanceOf(TvEpisodeData::class);
})->with('tv episodes');
