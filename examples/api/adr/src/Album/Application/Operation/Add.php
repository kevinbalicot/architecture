<?php

declare(strict_types=1);

namespace App\Album\Application\Operation;

use App\Album\Domain\DTO\Create;
use App\Album\Domain\Factory;
use App\Album\Domain\Model\Album;
use App\Album\Domain\Persister;

final class Add
{
    public function __construct(
        private readonly Factory $albumFactory,
        private readonly Persister $albumPersister
    ) {
    }

    public function __invoke(Create $createAlbum): Album
    {
        $album = $this->albumFactory->fromDTO($createAlbum);
        $this->albumPersister->save($album, true);

        return $album;
    }
}
