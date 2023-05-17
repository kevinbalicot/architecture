<?php

declare(strict_types=1);

namespace App\Album\Domain\DTO;

class Edit
{
    public function __construct(
        public int $id,
        public ?string $title,
        public ?string $author
    ) {
    }

    static public function fromData(int $id, array $data): self
    {
        return new self(
            $id,
            $data['title'] ?? null,
            $data['author'] ?? null
        );
    }
}
