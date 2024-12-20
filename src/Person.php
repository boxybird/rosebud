<?php

namespace Rosebud;

use Rosebud\DataTransferObjects\People\PersonData;
use Rosebud\Enums\ExternalSourcesEnum;

class Person extends Tmdb
{
    public function find(string $id, ExternalSourcesEnum $external_source = ExternalSourcesEnum::IMDB, int $times = 2, int $sleep = 2000): PersonData|null
    {
        $data = $this->findByID($id, $external_source, $times, $sleep);

        return $data ?? null;
    }
}