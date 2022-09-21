<?php

declare(strict_types=1);

namespace App\Shared\Application\Gateway\Instrumentation;

use App\Shared\Application\Gateway\GatewayRequestInterface;
use App\Shared\Application\Gateway\GatewayResponseInterface;

interface InstrumentationInterface
{
    public function start(GatewayRequestInterface $gatewayRequest): void;

    public function success(GatewayResponseInterface $gatewayResponse): void;

    public function error(GatewayRequestInterface $gatewayRequest, string $reason): void;
}
