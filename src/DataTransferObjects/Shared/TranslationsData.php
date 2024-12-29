<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Shared;

final readonly class TranslationsData
{
    public function __construct(
        /** @var TranslationData[] */
        public array $translations,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            translations: array_map(fn(array $translation) => TranslationData::fromArray($translation), $data['translations']),
        );
    }

    public function toArray(): array
    {
        return [
            'translations' => array_map(fn(TranslationData $translation) => $translation->toArray(), $this->translations),
        ];
    }
}