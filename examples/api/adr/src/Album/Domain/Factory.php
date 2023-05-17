<?php

declare(strict_types=1);

namespace App\Album\Domain;

use App\Album\Domain\DTO\Create;
use App\Album\Domain\Model\Album;

interface Factory
{
    public function createNew(string $title, string $author): Album;

    public function fromDTO(Create $dto): Album;
}
