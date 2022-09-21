<?php

declare(strict_types=1);

namespace App\Comment\Application\Controller;

use App\Comment\Domain\Repository\ProviderInterface;

class Index
{
    private ProviderInterface $provider;

    public function __construct(ProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    public function __invoke(): array
    {
        return $this->provider->find();
    }
}
