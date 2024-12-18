<?php

use Rosebud\DataTransferObjects\TvEpisodes\TvEpisodeData;
use Rosebud\TvEpisode;

it('finds tv episode by imdb id', function () {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $tv_episode = (new TvEpisode(api_key: $api_key))->find('tt2301451'); // Breaking Bad - Ozymandias

    expect($tv_episode)
        ->toBeInstanceOf(TvEpisodeData::class)
        ->and($tv_episode->name)->toBe('Ozymandias');
});