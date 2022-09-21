<?php

declare(strict_types=1);

namespace App\Comment\UI\Front\Action;

use App\Comment\Application\Controller\Index as IndexController;
use App\Comment\UI\Front\Responder\HomepageResponder;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class Index
{
    private IndexController $controller;
    private HomepageResponder $responder;

    public function __construct(IndexController $controller, HomepageResponder $responder)
    {
        $this->controller = $controller;
        $this->responder = $responder;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            return $this->process($response);
        } catch (\Throwable $exception) {
            return $response->withStatus(500, $exception->getMessage());
        }
    }

    /**
     * @throws \Throwable
     */
    private function process(ResponseInterface $response): ResponseInterface
    {
        return ($this->responder)($response, ($this->controller)());
    }
}
