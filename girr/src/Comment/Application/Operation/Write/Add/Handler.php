<?php

declare(strict_types=1);

namespace App\Comment\Application\Operation\Write\Add;

use App\Comment\Domain\Add\DataProvider\Factory\Builder;
use App\Comment\Domain\Add\DataProvider\Repository\ProviderInterface;

final class Handler
{
    private ProviderInterface $provider;

    public function __construct(ProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    public function __invoke(Command $command)
    {
        $this->provider->insert(Builder::createNew($command->getUsername(), $command->getMessage()));
    }
}
