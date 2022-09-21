<?php

declare(strict_types=1);

namespace App\Comment\UI\Shared\Responder;

use Psr\Http\Message\ResponseInterface;

class JsonResponder
{
    private HttpResponder $responder;

    public function __construct(HttpResponder $responder)
    {
        $this->responder = $responder;
    }

    public function __invoke(ResponseInterface $response, array $data = [], int $status = 200, string $statusMessage = ''): ResponseInterface
    {
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($data));

        return ($this->responder)($response, $status, $statusMessage);
    }
}
