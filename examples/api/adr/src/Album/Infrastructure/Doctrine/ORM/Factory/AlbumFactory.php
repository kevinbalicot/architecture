<?php

declare(strict_types=1);

namespace App\Album\Infrastructure\Doctrine\ORM\Factory;

use App\Album\Domain\DTO\Create;
use App\Album\Domain\Factory;
use App\Album\Domain\Model\Album;
use App\Album\Infrastructure\Doctrine\ORM\Entity\Album as AlbumEntity;

class AlbumFactory implements Factory
{
    public function createNew(string $title, string $author): Album
    {
        return new AlbumEntity($title, $author);
    }

    public function fromDTO(Create $dto): Album
    {
        return $this->createNew(
            $dto->title,
            $dto->author
        );
    }
}
