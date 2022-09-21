<?php

declare(strict_types=1);

namespace App\Shared\Application\Gateway;

interface GatewayResponseInterface
{
    public function getData(): array;
}
