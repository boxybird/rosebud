<?php

use Rosebud\DataTransferObjects\TvSeries\TvShowData;
use Rosebud\DataTransferObjects\TvSeries\TvShowDetailsData;
use Rosebud\Enums\ExternalSourcesEnum;
use Rosebud\TvShow;

it('finds tv show by imdb id', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $tv = (new TvShow(api_key: $api_key))->find('tt0903747'); // Breaking Bad

    expect($tv)
        ->toBeInstanceOf(TvShowData::class)
        ->and($tv->name)->toBe('Breaking Bad');
});


it('can get tv show details', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $tv_show = (new TvShow(api_key: $api_key))->details(924); // Dawn of the Dead (2004)

    expect($tv_show)->toBeInstanceOf(TvShowDetailsData::class);
});

it('finds tv show by tvdb id', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $tv_show = (new TvShow(api_key: $api_key))->find('81189', ExternalSourcesEnum::TVDB); // Breaking Bad

    expect($tv_show)
        ->toBeInstanceOf(TvShowData::class)
        ->and($tv_show->name)->toBe('Breaking Bad');
});