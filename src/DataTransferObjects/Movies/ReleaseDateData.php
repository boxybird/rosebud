<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Movies;

final readonly class ReleaseDateData
{
    public function __construct(
        public string $certification,
        /** @var string[] */
        public array $descriptors,
        public string $iso_639_1,
        public string $note,
        public string $release_date,
        public int $type,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            certification: $data['certification'],
            descriptors: $data['descriptors'],
            iso_639_1: $data['iso_639_1'],
            note: $data['note'],
            release_date: $data['release_date'],
            type: $data['type'],
        );
    }

    public function toArray(): array
    {
        return [
            'certification' => $this->certification,
            'descriptors' => $this->descriptors,
            'iso_639_1' => $this->iso_639_1,
            'note' => $this->note,
            'release_date' => $this->release_date,
            'type' => $this->type,
        ];
    }
}