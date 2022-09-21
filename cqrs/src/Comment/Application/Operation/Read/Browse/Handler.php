<?php

declare(strict_types=1);

namespace App\Comment\Application\Operation\Read\Browse;

use App\Comment\Domain\Browse\DataProvider\Repository\ProviderInterface;
use App\Comment\Domain\Model\CommentInterface;

final class Handler
{
    private ProviderInterface $provider;

    public function __construct(ProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @return array<CommentInterface>
     */
    public function __invoke(Query $query): array
    {
        return $this->provider->find();
    }
}
