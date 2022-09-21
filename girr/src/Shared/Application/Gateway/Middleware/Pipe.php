<?php

declare(strict_types=1);

namespace App\Shared\Application\Gateway\Middleware;

use App\Shared\Application\Gateway\GatewayRequestInterface;
use App\Shared\Application\Gateway\GatewayResponseInterface;

class Pipe
{
    private array $middlewares;

    public function __construct(array $middlewares = [])
    {
        $this->middlewares = $middlewares;
    }

    public function __invoke(GatewayRequestInterface $request, ?callable $next = null): GatewayResponseInterface
    {
        foreach (array_reverse($this->middlewares) as $middleware) {
            $next = static fn($request) => $middleware($request, $next);
        }

        if (null === $next) {
            throw new \LogicException('Next callable can not be null.');
        }

        return $next($request);
    }
}
