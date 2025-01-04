<?php

declare(strict_types=1);

namespace Rosebud\Enums;

enum GendersEnum: string
{
    case NOT_SPECIFIED = '0';
    case FEMALE = '1';
    case MALE = '2';
    case NON_BINARY = '3';

    public static function fromInt(int $value): ?self
    {
        return match ((string) $value) {
            self::NOT_SPECIFIED->value => self::NOT_SPECIFIED,
            self::FEMALE->value => self::FEMALE,
            self::MALE->value => self::MALE,
            self::NON_BINARY->value => self::NON_BINARY,
            default => null,
        };
    }

    public function getName(): string
    {
        return match ($this) {
            self::NOT_SPECIFIED => 'Not Specified',
            self::FEMALE => 'Female',
            self::MALE => 'Male',
            self::NON_BINARY => 'Non-Binary',
        };
    }
}