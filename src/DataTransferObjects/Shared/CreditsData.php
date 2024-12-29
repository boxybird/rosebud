<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Shared;

final readonly class CreditsData
{
    public function __construct(
        public ?int $id,
        /** @var CastMemberData[] */
        public array $cast,
        /** @var CrewMemberData[] */
        public array $crew,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            cast: array_map(fn(array $member) => CastMemberData::fromArray($member), $data['cast']),
            crew: array_map(fn(array $member) => CrewMemberData::fromArray($member), $data['crew']),
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'cast' => array_map(fn(CastMemberData $member) => $member->toArray(), $this->cast),
            'crew' => array_map(fn(CrewMemberData $member) => $member->toArray(), $this->crew),
        ];
    }
}