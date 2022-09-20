<?php

declare(strict_types=1);

namespace App\UI\Front\Action;

use App\Shared\Infrastructure\Comment\Manage;
use App\UI\Front\Responder\HomepageResponder;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class Homepage
{
    private Manage $manager;
    private HomepageResponder $responder;

    public function __construct(Manage $manager, HomepageResponder $responder)
    {
        $this->manager = $manager;
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
        return ($this->responder)($response, $this->manager->all());
    }
}
