<?php

namespace Rosebud;

use Rosebud\DataTransferObjects\TvShowData;
use Rosebud\Enums\ExternalSourcesEnum;

class TvShow extends Tmdb
{
    public function find(string $id, ExternalSourcesEnum $external_source = ExternalSourcesEnum::IMDB, int $times = 2, int $sleep = 2000): TvShowData|null
    {
        $result = $this->findByID($id, $external_source, 'tv_results', $times, $sleep);

        return $result ? TvShowData::fromArray($result) : null;
    }
}