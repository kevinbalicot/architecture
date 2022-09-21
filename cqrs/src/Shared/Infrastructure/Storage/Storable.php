<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Storage;

interface Storable
{
    public function getContent(): array;

    public function store(array $data): array;

    public function save(array $storage): bool;
}
