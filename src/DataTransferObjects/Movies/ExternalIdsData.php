<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Movies;

final readonly class ExternalIdsData
{
    public function __construct(
        public ?string $imdb_id,
        public ?string $wikidata_id,
        public ?string $facebook_id,
        public ?string $instagram_id,
        public ?string $twitter_id,
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
        ];
    }
}