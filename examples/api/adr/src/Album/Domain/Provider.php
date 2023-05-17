<?php

declare(strict_types=1);

namespace App\Album\Domain;

use App\Album\Domain\Model\Album;

interface Provider
{
    /** @return array<Album> */
    public function getAll(): array;

    public function getById(int $id): ?Album;
}
