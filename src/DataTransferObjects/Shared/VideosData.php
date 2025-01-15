<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Shared;

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
            results: array_map(fn(array $video): VideoData => VideoData::fromArray($video), $data['results'])
        );
    }

    public function toArray(): array
    {
        return [
            'results' => array_map(fn(VideoData $video): array => $video->toArray(), $this->results)
        ];
    }
}