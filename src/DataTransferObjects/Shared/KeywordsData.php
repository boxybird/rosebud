<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Shared;

final readonly class KeywordsData
{
    public function __construct(
        /** @var KeywordData[] */
        public array $keywords,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            keywords: array_map(fn(array $keyword): KeywordData => KeywordData::fromArray($keyword), $data['keywords'] ?? $data['results']),
        );
    }

    public function toArray(): array
    {
        return [
            'keywords' => array_map(fn(KeywordData $keyword): array => $keyword->toArray(), $this->keywords),
        ];
    }

}
