<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Movies;

use Rosebud\DataTransferObjects\ComputedData;

final readonly class ImageData
{
    public function __construct(
        public float $aspect_ratio,
        public int $height,
        public ?string $iso_639_1,
        public string $file_path,
        public float $vote_average,
        public int $vote_count,
        public int $width,
        public ComputedData $computed,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            aspect_ratio: $data['aspect_ratio'],
            height: $data['height'],
            iso_639_1: $data['iso_639_1'],
            file_path: $data['file_path'],
            vote_average: $data['vote_average'],
            vote_count: $data['vote_count'],
            width: $data['width'],
            computed: ComputedData::fromArray($data),
        );
    }

    public function toArray(): array
    {
        return [
            'aspect_ratio' => $this->aspect_ratio,
            'height' => $this->height,
            'iso_639_1' => $this->iso_639_1,
            'file_path' => $this->file_path,
            'vote_average' => $this->vote_average,
            'vote_count' => $this->vote_count,
            'width' => $this->width,
            'computed' => $this->computed->toArray(),
        ];
    }
}
