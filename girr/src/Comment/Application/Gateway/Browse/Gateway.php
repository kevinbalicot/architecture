<?php

declare(strict_types=1);

namespace App\Comment\Application\Gateway\Browse;

use App\Comment\Application\Gateway\Browse\Middleware\ErrorHandler;
use App\Comment\Application\Gateway\Browse\Middleware\Logger;
use App\Comment\Application\Gateway\Browse\Middleware\Processor;
use App\Shared\Application\Gateway\GatewayRequestInterface;
use App\Shared\Application\Gateway\GatewayResponseInterface;
use App\Shared\Application\Gateway\Middleware\Pipe;

final class Gateway
{
    private ErrorHandler $errorHandler;
    private Logger $logger;
    private Processor $processor;

    public function __construct(
        ErrorHandler $errorHandler,
        Logger $logger,
        Processor $processor
    ) {
        $this->errorHandler = $errorHandler;
        $this->logger = $logger;
        $this->processor = $processor;
    }

    public function __invoke(GatewayRequestInterface $request): GatewayResponseInterface
    {
        return (new Pipe([
            $this->logger,
            $this->errorHandler,
            $this->processor,
        ]))($request);
    }
}
