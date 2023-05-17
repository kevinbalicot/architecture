<?php

declare(strict_types=1);

namespace App\Album\Application\Operation;

use App\Album\Domain\DTO\Edit;
use App\Album\Domain\Exception\NotFoundException;
use App\Album\Domain\Model\Album;
use App\Album\Domain\Persister;
use App\Album\Domain\Provider;

final class Update
{
    public function __construct(
        private readonly Provider $albumProvider,
        private readonly Persister $albumPersister,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function __invoke(Edit $editAlbum): Album
    {
        $album = $this->albumProvider->getById($editAlbum->id);
        if (null === $album) {
            throw new NotFoundException(sprintf('Album with id %s not found', $editAlbum->id));
        }

        if (null !== $editAlbum->title) {
            $album->setTitle($editAlbum->title);
        }

        if (null !== $editAlbum->author) {
            $album->setAuthor($editAlbum->author);
        }

        $this->albumPersister->save($album, true);

        return $album;
    }
}
