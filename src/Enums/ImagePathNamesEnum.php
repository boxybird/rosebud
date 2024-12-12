<?php

declare(strict_types=1);

namespace Rosebud\Enums;

enum ImagePathNamesEnum: string
{
    case BACKDROP = 'backdrop_path';
    case POSTER = 'poster_path';
    case PROFILE = 'profile_path';
    case STILL = 'still_path';
    case LOGO = 'logo_path';
}