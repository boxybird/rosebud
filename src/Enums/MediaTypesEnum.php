<?php

declare(strict_types=1);

namespace Rosebud\Enums;

enum MediaTypesEnum: string
{
    case MOVIE = 'movie';
    case TV = 'tv';
    case TV_EPISODE = 'tv_episode';
    case PERSON = 'person';
    case COLLECTION = 'collection';
}
