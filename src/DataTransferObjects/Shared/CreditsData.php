<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects\Shared;

final readonly class CreditsData
{
    public function __construct(
        /** @var CastMemberData[] */
        public array $cast,
        /** @var CrewMemberData[] */
        public array $crew,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            cast: array_map(fn(array $member): CastMemberData => CastMemberData::fromArray($member), $data['cast']),
            crew: array_map(fn(array $member): CrewMemberData => CrewMemberData::fromArray($member), $data['crew']),
        );
    }

    public function toArray(): array
    {
        return [
            'cast' => array_map(fn(CastMemberData $member): array => $member->toArray(), $this->cast),
            'crew' => array_map(fn(CrewMemberData $member): array => $member->toArray(), $this->crew),
        ];
    }
}