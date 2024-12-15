<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects;

final readonly class ReviewData
{
    public function __construct(
        public string $author,
        public ReviewAuthorData $author_details,
        public string $content,
        public string $created_at,
        public string $id,
        public string $updated_at,
        public string $url,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            author: $data['author'],
            author_details: ReviewAuthorData::fromArray($data['author_details']),
            content: $data['content'],
            created_at: $data['created_at'],
            id: $data['id'],
            updated_at: $data['updated_at'],
            url: $data['url'],
        );
    }

    public function toArray(): array
    {
        return [
            'author' => $this->author,
            'author_details' => $this->author_details->toArray(),
            'content' => $this->content,
            'created_at' => $this->created_at,
            'id' => $this->id,
            'updated_at' => $this->updated_at,
            'url' => $this->url,
        ];
    }
}