<?php

declare(strict_types=1);

namespace App\Comment\Application\Controller;

use App\Comment\Application\Operation\Read\Browse\Query;
use App\Shared\Infrastructure\MessageBus\SyncQueryBus;

class Index
{
    private SyncQueryBus $messageBus;

    public function __construct(SyncQueryBus $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function __invoke(): array
    {
        return ($this->messageBus)(new Query());
    }
}
