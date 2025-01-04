<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Shared;

final readonly class TranslationDataContent
{
    public function __construct(
        public ?string $homepage,
        public ?string $overview,
        public ?int $runtime,
        public ?string $tagline,
        public ?string $title,
        public ?string $name,
        public ?string $biography,
        public ?bool $primary
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            homepage: $data['homepage'] ?? null,
            overview: $data['overview'] ?? null,
            runtime: $data['runtime'] ?? null,
            tagline: $data['tagline'] ?? null,
            title: $data['title'] ?? null,
            name: $data['name'] ?? null,
            biography: $data['biography'] ?? null,
            primary: $data['primary'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'homepage' => $this->homepage,
            'overview' => $this->overview,
            'runtime' => $this->runtime,
            'tagline' => $this->tagline,
            'title' => $this->title,
            'name' => $this->name,
        ];
    }
}