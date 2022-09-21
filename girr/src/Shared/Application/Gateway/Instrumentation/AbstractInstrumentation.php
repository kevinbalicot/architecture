<?php

declare(strict_types=1);

namespace App\Shared\Application\Gateway\Instrumentation;

use App\Shared\Application\Gateway\GatewayRequestInterface;
use App\Shared\Application\Gateway\GatewayResponseInterface;
use Psr\Log\LoggerInterface;

abstract class AbstractInstrumentation implements InstrumentationInterface
{
    public const NAME = '';

    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function start(GatewayRequestInterface $gatewayRequest): void
    {
        $this->logger->info(static::NAME, $gatewayRequest->getData());
    }

    public function success(GatewayResponseInterface $gatewayResponse): void
    {
        $this->logger->info(\sprintf('%s.success', static::NAME), $gatewayResponse->getData());
    }

    public function error(GatewayRequestInterface $gatewayRequest, string $reason): void
    {
        $this->logger->error(\sprintf('%s.error', static::NAME), array_merge(
            $gatewayRequest->getData(),
            [' reason' => $reason]
        ));
    }
}
