<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Movies;

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
            keywords: array_map(fn(array $keyword) => KeywordData::fromArray($keyword), $data['keywords']),
        );
    }

    public function toArray(): array
    {
        return [
            'keywords' => array_map(fn(KeywordData $keyword) => $keyword->toArray(), $this->keywords),
        ];
    }

}
