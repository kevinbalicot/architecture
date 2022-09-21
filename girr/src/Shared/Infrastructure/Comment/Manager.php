<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Comment;

use App\Shared\Infrastructure\Storage\Storable;

final class Manager implements Manage
{
    private Storable $storage;

    public function __construct(Storable $storage)
    {
        $this->storage = $storage;
    }

    public function all(): array
    {
        return $this->storage->getContent();
    }

    public function insert(array $data): array
    {
        if (!isset($data['username']) || !isset($data['message'])) {
            throw new \LogicException('Need username and message.');
        }

        return $this->storage->store($data);
    }
}
