<?php

declare(strict_types=1);

namespace App\Album\Domain;

use App\Album\Domain\Model\Album;

interface Persister
{
    public function save(Album $album, bool $flush): void;

    public function remove(Album $album, bool $flush): void;
}
