<?php

declare(strict_types=1);

namespace App\Comment\UI\Front\Action;

use App\Comment\Application\Gateway\Browse\Gateway;
use App\Comment\Application\Gateway\Browse\Request;
use App\Comment\UI\Front\Responder\HomepageResponder;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class Index
{
    private Gateway $gateway;
    private HomepageResponder $responder;

    public function __construct(Gateway $gateway, HomepageResponder $responder)
    {
        $this->gateway = $gateway;
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
        $gatewayResponse = ($this->gateway)(new Request());

        return ($this->responder)($response, $gatewayResponse->getData());
    }
}
