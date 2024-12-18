<?php

namespace Rosebud;

use Rosebud\DataTransferObjects\TvSeries\TvShowData;
use Rosebud\Enums\ExternalSourcesEnum;

class TvShow extends Tmdb
{
    public function find(string $id, ExternalSourcesEnum $external_source = ExternalSourcesEnum::IMDB, int $times = 2, int $sleep = 2000): TvShowData|null
    {
        $data = $this->findByID($id, $external_source, $times, $sleep);

        return $data ?? null;
    }
}