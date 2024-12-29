<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Shared;

final readonly class SpokenLanguageData
{
    public function __construct(
        public string $english_name,
        public string $iso_639_1,
        public string $name
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            english_name: $data['english_name'],
            iso_639_1: $data['iso_639_1'],
            name: $data['name']
        );
    }

    public function toArray(): array
    {
        return [
            'english_name' => $this->english_name,
            'iso_639_1' => $this->iso_639_1,
            'name' => $this->name
        ];
    }
}