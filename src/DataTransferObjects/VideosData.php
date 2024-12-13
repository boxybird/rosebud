<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects;

final readonly class VideosData
{
    public function __construct(
        /** @var VideoData[] */
        public array $results,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            results: array_map(fn(array $video) => VideoData::fromArray($video), $data['results'])
        );
    }

    public function toArray(): array
    {
        return [
            'results' => array_map(fn(VideoData $video) => $video->toArray(), $this->results)
        ];
    }
}