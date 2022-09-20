<?php

declare(strict_types=1);

namespace App\Comment\Application\Controller;

use App\Comment\Domain\Repository\ProviderInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class Index
{
    const HOMEPAGE_TEMPLATE = 'front/homepage.html.php';

    private ProviderInterface $provider;

    public function __construct(ProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $renderer = new PhpRenderer(__DIR__ . '/../../../../templates');
        $data = $this->provider->find();

        return $renderer->render($response, self::HOMEPAGE_TEMPLATE, ['comments' => $data]);
    }
}
