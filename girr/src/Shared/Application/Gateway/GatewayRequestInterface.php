<?php

declare(strict_types=1);

namespace App\Shared\Application\Gateway;

interface GatewayRequestInterface
{
    public function getData(): array;
}
