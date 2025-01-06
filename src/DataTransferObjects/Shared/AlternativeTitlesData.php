<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Shared;

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
            titles: array_map(fn(array $title): AlternativeTitleData => AlternativeTitleData::fromArray($title), $data['titles'] ?? $data['results']),
        );
    }

    public function toArray(): array
    {
        return [
            'titles' => array_map(fn(AlternativeTitleData $title): array => $title->toArray(), $this->titles),
        ];
    }
}