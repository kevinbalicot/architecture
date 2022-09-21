<?php

declare(strict_types=1);

namespace App\Comment\Application\Controller;

use App\Comment\Application\Operation\Write\Add\Command;
use App\Shared\Infrastructure\MessageBus\SyncCommandBus;

class Add
{
    private SyncCommandBus $commandBus;

    public function __construct(SyncCommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function __invoke(array $data): void
    {
        ['username' => $username, 'message' => $message] = $data;

        ($this->commandBus)(new Command($username, $message));
    }
}
