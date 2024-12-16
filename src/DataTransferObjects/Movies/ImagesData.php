<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Movies;

final readonly class ImagesData
{
    public function __construct(
        public array $backdrops,
        public array $logos,
        public array $posters
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            backdrops: array_map(fn(array $image) => ImageData::fromArray($image), $data['backdrops']),
            logos: array_map(fn(array $image) => ImageData::fromArray($image), $data['logos']),
            posters: array_map(fn(array $image) => ImageData::fromArray($image), $data['posters'])
        );
    }

    public function toArray(): array
    {
        return [
            'backdrops' => array_map(fn(ImageData $image) => $image->toArray(), $this->backdrops),
            'logos' => array_map(fn(ImageData $image) => $image->toArray(), $this->logos),
            'posters' => array_map(fn(ImageData $image) => $image->toArray(), $this->posters)
        ];
    }
}