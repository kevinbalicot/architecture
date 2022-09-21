<?php

declare(strict_types=1);

namespace App\Comment\Application\Gateway\Browse\Middleware;

use App\Comment\Application\Gateway\Browse\Instrumentation;
use App\Shared\Application\Gateway\GatewayRequestInterface;
use App\Shared\Application\Gateway\GatewayResponseInterface;

final class Logger
{
    private Instrumentation $instrumentation;

    public function __construct(Instrumentation $instrumentation)
    {
        $this->instrumentation = $instrumentation;
    }

    public function __invoke(GatewayRequestInterface $request, callable $next): GatewayResponseInterface
    {
        $this->instrumentation->start($request);
        $response = ($next)($request);
        $this->instrumentation->success($response);

        return $response;
    }
}
