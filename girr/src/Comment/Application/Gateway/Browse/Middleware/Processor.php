<?php

declare(strict_types=1);

namespace App\Comment\Application\Gateway\Browse\Middleware;

use App\Comment\Application\Gateway\Browse\Request;
use App\Comment\Application\Gateway\Browse\Response;
use App\Comment\Application\Operation\Read\Browse\Query;
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
        return new Response(($this->messageBus)(new Query()));
    }
}
