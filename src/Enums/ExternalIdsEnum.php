<?php

declare(strict_types=1);

namespace Rosebud\Enums;

enum ExternalIdsEnum: string
{
    case IMDB = 'imdb_id';
    case WIKIDATA = 'wikidata_id';
    case FACEBOOK = 'facebook_id';
    case INSTAGRAM = 'instagram_id';
    case TWITTER = 'twitter_id';
    case FREEBASE = 'freebase_id';
    case FREEBASE_MID = 'freebase_mid';
    case TVDB = 'tvdb_id';
    case TVRAGE = 'tvrage_id';
    case TIKTOK = 'tiktok_id';
    case YOUTUBE = 'youtube_id';
}