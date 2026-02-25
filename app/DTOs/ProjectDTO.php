<?php

namespace App\DTOs;

class ProjectDTO
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $description,
        public readonly string $status,
        public readonly ?string $start_date,
        public readonly ?string $end_date,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['description'] ?? null,
            $data['status'],
            $data['start_date'] ?? null,
            $data['end_date'] ?? null,
        );
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}