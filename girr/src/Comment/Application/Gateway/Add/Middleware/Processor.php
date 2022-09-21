<?php

declare(strict_types=1);

namespace App\Comment\Application\Gateway\Add\Middleware;

use App\Comment\Application\Gateway\Add\Request;
use App\Comment\Application\Gateway\Add\Response;
use App\Comment\Application\Operation\Write\Add\Command;
use App\Shared\Infrastructure\MessageBus\SyncQueryBus;

final class Processor
{
    private SyncQueryBus $messageBus;

    public function __construct(SyncQueryBus $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function __invoke(Request $request): Response
    {
        $command = new Command($request->getUsername(), $request->getMessage());

        return new Response(($this->messageBus)($command));
    }
}
