<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects;

final readonly class VideoData
{
    public function __construct(
        public string $iso_639_1,
        public string $iso_3166_1,
        public string $name,
        public string $key,
        public string $site,
        public int $size,
        public string $type,
        public bool $official,
        public string $published_at,
        public string $id,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            iso_639_1: $data['iso_639_1'],
            iso_3166_1: $data['iso_3166_1'],
            name: $data['name'],
            key: $data['key'],
            site: $data['site'],
            size: $data['size'],
            type: $data['type'],
            official: $data['official'],
            published_at: $data['published_at'],
            id: $data['id']
        );
    }

    public function toArray(): array
    {
        return [
            'iso_639_1' => $this->iso_639_1,
            'iso_3166_1' => $this->iso_3166_1,
            'name' => $this->name,
            'key' => $this->key,
            'site' => $this->site,
            'size' => $this->size,
            'type' => $this->type,
            'official' => $this->official,
            'published_at' => $this->published_at,
            'id' => $this->id
        ];
    }
}