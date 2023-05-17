<?php

declare(strict_types=1);

namespace App\Album\Domain\DTO;

final class Id
{
    public function __construct(
        public int $id
    ) {
    }

    static public function fromData(int $id): self
    {
        return new self($id);
    }
}
