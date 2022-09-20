<?php

declare(strict_types=1);

namespace App\Comment\UI\Shared\Responder;

use Psr\Http\Message\ResponseInterface;

class HttpResponder
{
    public function __invoke(ResponseInterface $response, int $status = 200, string $statusMessage = ''): ResponseInterface
    {
        return $response->withStatus($status, $statusMessage);
    }
}
