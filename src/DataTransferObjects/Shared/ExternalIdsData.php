<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Shared;

final readonly class ExternalIdsData
{
    public function __construct(
        public ?string $imdb_id,
        public ?string $wikidata_id,
        public ?string $facebook_id,
        public ?string $instagram_id,
        public ?string $twitter_id,
        public ?string $freebase_mid,
        public ?string $freebase_id,
        public ?int $tvdb_id,
        public ?int $tvrage_id,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            imdb_id: $data['imdb_id'],
            wikidata_id: $data['wikidata_id'],
            facebook_id: $data['facebook_id'],
            instagram_id: $data['instagram_id'],
            twitter_id: $data['twitter_id'],
            freebase_mid: $data['freebase_mid'] ?? null,
            freebase_id: $data['freebase_id'] ?? null,
            tvdb_id: $data['tvdb_id'] ?? null,
            tvrage_id: $data['tvrage_id'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'imdb_id' => $this->imdb_id,
            'wikidata_id' => $this->wikidata_id,
            'facebook_id' => $this->facebook_id,
            'instagram_id' => $this->instagram_id,
            'twitter_id' => $this->twitter_id,
            'freebase_mid' => $this->freebase_mid,
            'freebase_id' => $this->freebase_id,
            'tvdb_id' => $this->tvdb_id,
            'tvrage_id' => $this->tvrage_id,
        ];
    }
}