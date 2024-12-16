<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Movies;

final readonly class CreditsData
{
    public function __construct(
        /** @var CastMemberData[] */
        public array $cast,
        /** @var CrewMemberData[] */
        public array $crew,
        public ?int $id = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            cast: array_map(fn(array $member) => CastMemberData::fromArray($member), $data['cast']),
            crew: array_map(fn(array $member) => CrewMemberData::fromArray($member), $data['crew']),
            id: $data['id'] ?? null
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