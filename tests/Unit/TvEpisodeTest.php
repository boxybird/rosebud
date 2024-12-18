<?php

use Rosebud\DataTransferObjects\TvEpisodes\TvEpisodeData;
use Rosebud\TvEpisode;

it('finds tv episode by imdb id', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $tv = (new TvEpisode(api_key: $api_key))->find('tt2301451'); // Breaking Bad - Ozymandias

    expect($tv)
        ->toBeInstanceOf(TvEpisodeData::class)
        ->and($tv->name)->toBe('Ozymandias');
});