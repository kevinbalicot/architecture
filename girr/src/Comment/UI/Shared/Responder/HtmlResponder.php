<?php

declare(strict_types=1);

namespace App\Comment\UI\Shared\Responder;

use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class HtmlResponder
{
    /**
     * @throws \Throwable
     */
    public function __invoke(ResponseInterface $response, string $htmlTemplate, array $data): ResponseInterface
    {
        $renderer = new PhpRenderer(__DIR__ . '/../../../../../templates');

        return $renderer->render($response, $htmlTemplate, $data);
    }
}
