<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Movies;

final readonly class ReviewAuthorData
{
    public function __construct(
        public string $name,
        public string $username,
        public ?string $avatar_path,
        public int|float|null $rating,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            username: $data['username'],
            avatar_path: $data['avatar_path'],
            rating: $data['rating'],
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'username' => $this->username,
            'avatar_path' => $this->avatar_path,
            'rating' => $this->rating,
        ];
    }
}
