<?php

declare(strict_types=1);

namespace App\Album\Application\Operation;

use App\Album\Domain\DTO\Id;
use App\Album\Domain\Exception\NotFoundException;
use App\Album\Domain\Persister;
use App\Album\Domain\Provider;

final class Remove
{
    public function __construct(
        private readonly Provider $albumProvider,
        private readonly Persister $albumPersister
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function __invoke(Id $id): void
    {
        $album = $this->albumProvider->getById($id->id);
        if (null === $album) {
            throw new NotFoundException(sprintf('Album with id %s not found', $id->id));
        }

        $this->albumPersister->remove($album);
    }
}
