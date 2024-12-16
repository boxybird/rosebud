<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Movies;

final readonly class AlternativeTitlesData
{
    public function __construct(
        /** @var AlternativeTitleData[] */
        public array $titles,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            titles: array_map(fn(array $title) => AlternativeTitleData::fromArray($title), $data['titles']),
        );
    }

    public function toArray(): array
    {
        return [
            'titles' => array_map(fn(AlternativeTitleData $title) => $title->toArray(), $this->titles),
        ];
    }
}