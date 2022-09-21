<?php

declare(strict_types=1);

namespace App\Shared\Application\Gateway;

class GatewayException extends \Exception
{
    public function __construct(string $message, \Exception $exception)
    {
        parent::__construct(
            sprintf(
                '%s in %s: %s',
                $message,
                $exception->getFile(),
                $exception->getMessage(),
            ),
            $exception
        );
    }
}
