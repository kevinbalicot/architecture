<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Comment;

interface Manage
{
    public function all(): array;

    public function insert(array $data): array;
}
