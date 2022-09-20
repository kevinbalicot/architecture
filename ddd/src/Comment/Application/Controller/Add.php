<?php

declare(strict_types=1);

namespace App\Comment\Application\Controller;

use App\Comment\Domain\Factory\Builder;
use App\Comment\Domain\Repository\ProviderInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Add
{
    private ProviderInterface $provider;

    public function __construct(ProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $comment = Builder::createFromData($request->getParsedBody());
        $this->provider->insert($comment);

        return $response
            ->withHeader('Location', '/')
            ->withStatus(301, 'Moved Permanently');
    }
}
