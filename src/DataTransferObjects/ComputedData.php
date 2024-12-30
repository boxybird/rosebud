<?php

declare(strict_types=1);

namespace Rosebud\DataTransferObjects;

use Rosebud\Enums\ImagePathNamesEnum;
use Rosebud\Enums\ImageSizesEnum;

final class ComputedData
{
    public function __construct(
        protected readonly array $data,
        protected readonly string $base_url = 'https://image.tmdb.org/t/p/',

        public array $backdrop_paths = [],
        public array $poster_paths = [],
        public array $profile_paths = [],
        public array $still_paths = [],
        public array $logo_paths = [],
        public array $file_paths = [],
    ) {
        $this->setPaths();
    }

    protected function setPaths(): void
    {
        foreach (ImagePathNamesEnum::cases() as $name) {
            $name_path = $this->data[$name->value] ?? null;

            if (!$name_path) {
                continue;
            }

            foreach (ImageSizesEnum::cases() as $size) {
                $this->{$name->value.'s'}[$size->value] = $this->base_url.$size->value.$name_path;
            }
        }
    }

    public static function fromArray(array $data): self
    {
        return new self($data);
    }

    public function toArray(): array
    {
        return [
            'backdrop_paths' => $this->backdrop_paths,
            'poster_paths' => $this->poster_paths,
            'profile_paths' => $this->profile_paths,
            'still_paths' => $this->still_paths,
            'logo_paths' => $this->logo_paths,
            'file_paths' => $this->file_paths,
        ];
    }
}