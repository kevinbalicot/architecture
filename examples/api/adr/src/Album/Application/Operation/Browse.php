<?php

declare(strict_types=1);

namespace App\Album\Application\Operation;

use App\Album\Domain\Provider;

final class Browse
{
    public function __construct(
        private readonly Provider $albumProvider
    ) {
    }

    public function __invoke(): array
    {
        return $this->albumProvider->getAll();
    }
}
