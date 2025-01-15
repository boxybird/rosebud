<?php

namespace Rosebud;

use Rosebud\DataTransferObjects\People\PersonData;
use Rosebud\DataTransferObjects\People\PersonDetailsData;
use Rosebud\Enums\ExternalIdsEnum;

class Person extends Tmdb
{
    public function find(
        string $id,
        ExternalIdsEnum $external_source = ExternalIdsEnum::IMDB,
        bool $raw = false,
        int $times = self::DEFAULT_TIMES,
        int $sleep = self::DEFAULT_SLEEP
    ): PersonData|array|null {
        return parent::findByID($id, $external_source, $raw, $times, $sleep);
    }

    public function details(
        int $person_id,
        bool $raw = false,
        int $times = self::DEFAULT_TIMES,
        int $sleep = self::DEFAULT_SLEEP
    ): PersonDetailsData|array {
        $data = $this->get($this->base_url.'/person/'.$person_id, [
            'append_to_response' => $this->getDetailsAppendParams()
        ], $times, $sleep);

        return $raw ? $data : PersonDetailsData::fromArray($data);
    }

    protected function getDetailsAppendParams(): string
    {
        return implode(',', [
            'combined_credits',
            'external_ids',
            'images',
            'translations'
        ]);
    }
}
