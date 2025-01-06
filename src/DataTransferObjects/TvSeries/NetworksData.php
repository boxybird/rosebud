<?php

namespace Rosebud\DataTransferObjects\TvSeries;

class NetworksData
{
    public function __construct(
        /** @var NetworkData[] */
        public array $networks,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            networks: array_map(fn($item): NetworkData => NetworkData::fromArray($item), $data['networks']),
        );
    }

    public function toArray(): array
    {
        return [
            'networks' => array_map(fn(NetworkData $item): array => $item->toArray(), $this->networks),
        ];
    }
}