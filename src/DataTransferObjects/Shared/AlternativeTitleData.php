<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Shared;

final readonly class AlternativeTitleData
{
    public function __construct(
        public string $iso_3166_1,
        public string $title,
        public string $type,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            iso_3166_1: $data['iso_3166_1'],
            title: $data['title'],
            type: $data['type'],
        );
    }

    public function toArray(): array
    {
        return [
            'iso_3166_1' => $this->iso_3166_1,
            'title' => $this->title,
            'type' => $this->type,
        ];
    }
}