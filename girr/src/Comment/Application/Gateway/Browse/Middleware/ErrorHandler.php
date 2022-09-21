<?php

declare(strict_types=1);

namespace App\Comment\Application\Gateway\Browse\Middleware;

use App\Comment\Application\Gateway\Browse\Instrumentation;
use App\Shared\Application\Gateway\GatewayException;
use App\Shared\Application\Gateway\GatewayRequestInterface;
use App\Shared\Application\Gateway\GatewayResponseInterface;

final class ErrorHandler
{
    private Instrumentation $instrumentation;

    public function __construct(Instrumentation $instrumentation)
    {
        $this->instrumentation = $instrumentation;
    }

    /**
     * @throws GatewayException
     */
    public function __invoke(GatewayRequestInterface $request, callable $next): GatewayResponseInterface
    {
        try {
            return ($next)($request);
        } catch (\Exception $exception) {
            $this->instrumentation->error($request, $exception->getMessage());

            throw new GatewayException(
                'Error during browse comment process',
                $exception,
            );
        }
    }
}
