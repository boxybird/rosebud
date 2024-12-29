<?php

namespace Rosebud\DataTransferObjects\TvSeries;

final readonly class CreatedBysData
{
    public function __construct(
        /** @var CreatedByData[] */
        public array $created_bys,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            created_bys: array_map(fn($item) => CreatedByData::fromArray($item), $data['created_by']),
        );
    }

    public function toArray(): array
    {
        return [
            'created_bys' => array_map(fn(CreatedByData $item) => $item->toArray(), $this->created_bys),
        ];
    }
}