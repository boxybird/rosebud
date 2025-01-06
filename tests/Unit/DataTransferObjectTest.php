<?php

use Rosebud\DataTransferObjects\Movies\MovieData;
use Rosebud\DataTransferObjects\Movies\MovieDetailsData;
use Rosebud\DataTransferObjects\People\PersonData;
use Rosebud\DataTransferObjects\People\PersonDetailsData;
use Rosebud\DataTransferObjects\TvEpisodes\TvEpisodeData;
use Rosebud\DataTransferObjects\TvSeries\TvShowData;
use Rosebud\DataTransferObjects\TvSeries\TvShowDetailsData;

it('can create a movie data transfer object and then back to matching array', function (array $movie): void {
    $movie_data = MovieData::fromArray($movie);

    expect($movie_data)->toBeInstanceOf(MovieData::class);

    $reflection = new ReflectionClass($movie_data);
    $properties = array_map(fn($property) => $property->getName(), $reflection->getProperties());

    $movie_array = $movie_data->toArray();

    expect($movie_array)->toBeArray()
        ->and($movie_array)->toHaveKeys($properties);

})->with('movies');

it('can create a movie detail data transfer object and then back to matching array', function (array $movie): void {
    $movie_data = MovieDetailsData::fromArray($movie);

    expect($movie_data)->toBeInstanceOf(MovieDetailsData::class);

    $reflection = new ReflectionClass($movie_data);
    $properties = array_map(fn($property) => $property->getName(), $reflection->getProperties());

    $movie_array = $movie_data->toArray();

    expect($movie_array)->toBeArray()
        ->and($movie_array)->toHaveKeys($properties);
})->with('movie details');

it('can create a person data transfer object and then back to matching array', function (array $person): void {
    $person_data = PersonData::fromArray($person);

    expect($person_data)->toBeInstanceOf(PersonData::class);

    $reflection = new ReflectionClass($person_data);
    $properties = array_map(fn($property) => $property->getName(), $reflection->getProperties());

    $person_array = $person_data->toArray();

    expect($person_array)->toBeArray()
        ->and($person_array)->toHaveKeys($properties);
})->with('person');

it('can create a person detail data transfer object and then back to matching array', function (array $person): void {
    $person_data = PersonDetailsData::fromArray($person);

    expect($person_data)->toBeInstanceOf(PersonDetailsData::class);

    $reflection = new ReflectionClass($person_data);
    $properties = array_map(fn($property) => $property->getName(), $reflection->getProperties());

    $person_array = $person_data->toArray();

    expect($person_array)->toBeArray()
        ->and($person_array)->toHaveKeys($properties);
})->with('person details');

it('can create a tv show data transfer object and then back to matching array', function (array $tv_show): void {
    $tv_show_data = TvShowData::fromArray($tv_show);

    expect($tv_show_data)->toBeInstanceOf(TvShowData::class);

    $reflection = new ReflectionClass($tv_show_data);
    $properties = array_map(fn($property) => $property->getName(), $reflection->getProperties());

    $tv_show_array = $tv_show_data->toArray();

    expect($tv_show_array)->toBeArray()
        ->and($tv_show_array)->toHaveKeys($properties);
})->with('tv shows');

it('can create a tv show detail data transfer object and then back to matching array', function (array $tv_show): void {
    $tv_show_data = TvShowDetailsData::fromArray($tv_show);

    expect($tv_show_data)->toBeInstanceOf(TvShowDetailsData::class);

    $reflection = new ReflectionClass($tv_show_data);
    $properties = array_map(fn($property) => $property->getName(), $reflection->getProperties());

    $tv_show_array = $tv_show_data->toArray();

    expect($tv_show_array)->toBeArray()
        ->and($tv_show_array)->toHaveKeys($properties);
})->with('tv show details');

it('can create a tv episode data transfer object and then back to matching array', function (array $tv_episode): void {
    $tv_episode_data = TvEpisodeData::fromArray($tv_episode);

    expect($tv_episode_data)->toBeInstanceOf(TvEpisodeData::class);

    $reflection = new ReflectionClass($tv_episode_data);
    $properties = array_map(fn($property) => $property->getName(), $reflection->getProperties());

    $tv_episode_array = $tv_episode_data->toArray();

    expect($tv_episode_array)->toBeArray()
        ->and($tv_episode_array)->toHaveKeys($properties);
})->with('tv episodes');
