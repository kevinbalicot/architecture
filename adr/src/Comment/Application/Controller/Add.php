<?php

declare(strict_types=1);

namespace App\Comment\Application\Controller;

use App\Comment\Domain\Factory\Builder;
use App\Comment\Domain\Repository\ProviderInterface;

class Add
{
    private ProviderInterface $provider;

    public function __construct(ProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    public function __invoke(array $data): array
    {
        $comment = Builder::createFromData($data);
        $this->provider->insert($comment);

        return $this->provider->find();
    }
}
