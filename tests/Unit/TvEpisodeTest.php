<?php

use Rosebud\DataTransferObjects\TvEpisodes\TvEpisodeData;
use Rosebud\DataTransferObjects\TvEpisodes\TvEpisodeDetailsData;
use Rosebud\TvEpisode;

it('finds tv episode by imdb id', function (): void {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $tv_episode = (new TvEpisode(api_key: $api_key))->find('tt2301451', raw: true); // Breaking Bad - Ozymandias

    expect($tv_episode)
        ->toBeArray()
        ->and($tv_episode['name'])->toBe('Ozymandias');
});

it('finds tv episode by imdb id and returns dto', function (): void {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $tv_episode = (new TvEpisode(api_key: $api_key))->find('tt2301451'); // Breaking Bad - Ozymandias

    expect($tv_episode)
        ->toBeInstanceOf(TvEpisodeData::class)
        ->and($tv_episode->name)->toBe('Ozymandias');
});

it('can get tv episode details', function (): void {
    $api_key = getTestingEnv('TMDB_API_KEY');

    $tv_episode_details = (new TvEpisode(api_key: $api_key))->details(1396, 5, 14); // Breaking Bad - Ozymandias

    expect($tv_episode_details)
        ->toBeInstanceOf(TvEpisodeDetailsData::class)
        ->and($tv_episode_details->name)->toBe('Ozymandias');
});