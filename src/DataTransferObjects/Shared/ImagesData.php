<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Shared;

final readonly class ImagesData
{
    public function __construct(
        public array $backdrops,
        public array $logos,
        public array $posters,
        public array $profiles,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            backdrops: array_map(fn(array $image): ImageData => ImageData::fromArray($image), $data['backdrops'] ?? []),
            logos: array_map(fn(array $image): ImageData => ImageData::fromArray($image), $data['logos'] ?? []),
            posters: array_map(fn(array $image): ImageData => ImageData::fromArray($image), $data['posters'] ?? []),
            profiles: array_map(fn(array $image): ImageData => ImageData::fromArray($image), $data['profiles'] ?? []),
        );
    }

    public function toArray(): array
    {
        return [
            'backdrops' => array_map(fn(ImageData $image): array => $image->toArray(), $this->backdrops),
            'logos' => array_map(fn(ImageData $image): array => $image->toArray(), $this->logos),
            'posters' => array_map(fn(ImageData $image): array => $image->toArray(), $this->posters)
        ];
    }
}