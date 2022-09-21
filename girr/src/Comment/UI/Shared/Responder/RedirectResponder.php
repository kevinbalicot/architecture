<?php

declare(strict_types=1);

namespace App\Comment\UI\Shared\Responder;

use Psr\Http\Message\ResponseInterface;

class RedirectResponder
{
    private HttpResponder $responder;

    public function __construct(HttpResponder $responder)
    {
        $this->responder = $responder;
    }

    public function __invoke(
        ResponseInterface $response,
        string $redirectUrl,
        int $status = 301,
        string $statusMessage = 'Moved Permanently'
    ): ResponseInterface
    {
        $response = $response->withHeader('Location', $redirectUrl);

        return ($this->responder)($response, $status, $statusMessage);
    }
}
