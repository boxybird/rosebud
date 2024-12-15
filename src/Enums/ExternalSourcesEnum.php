<?php

declare(strict_types=1);

namespace Rosebud\Enums;

enum ExternalSourcesEnum: string
{
    case IMDB = 'imdb_id';
    case FACEBOOK = 'facebook_id';
    case INSTAGRAM = 'instagram_id';
    case TVDB = 'tvdb_id';
    case TIKTOK = 'tiktok_id';
    case TWITTER = 'twitter_id';
    case WIKIDATA = 'wikidata_id';
    case YOUTUBE = 'youtube_id';
}