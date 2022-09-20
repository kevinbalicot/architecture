<?php

declare(strict_types=1);

namespace App\UI\Front\Responder;

use App\UI\Shared\Responder\HtmlResponder;
use Psr\Http\Message\ResponseInterface;

class HomepageResponder
{
    const HOMEPAGE_TEMPLATE = 'front/homepage.html.php';

    private HtmlResponder $responder;

    public function __construct(HtmlResponder $responder)
    {
        $this->responder = $responder;
    }

    /**
     * @throws \Throwable
     */
    public function __invoke(ResponseInterface $response, array $data): ResponseInterface
    {
        return ($this->responder)($response, self::HOMEPAGE_TEMPLATE, ['comments' => $data]);
    }
}
