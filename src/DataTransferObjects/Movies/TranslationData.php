<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Movies;

final readonly class TranslationData
{
    public function __construct(
        public string $iso_3166_1,
        public string $iso_639_1,
        public ?string $name,
        public ?string $english_name,
        public TranslationDataContent $data,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            iso_3166_1: $data['iso_3166_1'],
            iso_639_1: $data['iso_639_1'],
            name: $data['name'],
            english_name: $data['english_name'],
            data: TranslationDataContent::fromArray($data['data']),
        );
    }

    public function toArray(): array
    {
        return [
            'iso_3166_1' => $this->iso_3166_1,
            'iso_639_1' => $this->iso_639_1,
            'name' => $this->name,
            'english_name' => $this->english_name,
            'data' => $this->data->toArray(),
        ];
    }
}
