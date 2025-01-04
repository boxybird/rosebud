<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\People;

final readonly class CombinedCreditsData
{
    public function __construct(
        /** @var CreditCastData[] */
        public ?array $cast,
        /** @var CreditCrewData[] */
        public ?array $crew,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            cast: $data['cast'] ?? null ? array_map(fn(array $cast) => CreditCastData::fromArray($cast), $data['cast']) : null,
            crew: $data['crew'] ?? null ? array_map(fn(array $crew) => CreditCrewData::fromArray($crew), $data['crew']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'cast' => $this->cast ? array_map(fn(CreditCastData $cast) => $cast->toArray(), $this->cast) : null,
            'crew' => $this->crew ? array_map(fn(CreditCrewData $crew) => $crew->toArray(), $this->crew) : null,
        ];
    }
}