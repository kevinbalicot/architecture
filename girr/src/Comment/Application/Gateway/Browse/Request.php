<?php

declare(strict_types=1);

namespace App\Comment\Application\Gateway\Browse;

use App\Shared\Application\Gateway\GatewayRequestInterface;

final class Request implements GatewayRequestInterface
{
    public function getData(): array
    {
        return [];
    }
}
