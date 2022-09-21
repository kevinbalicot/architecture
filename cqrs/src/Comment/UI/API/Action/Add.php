<?php

declare(strict_types=1);

namespace App\Comment\UI\API\Action;

use App\Comment\Application\Controller\Add as AddController;
use App\Comment\UI\Shared\Responder\JsonResponder;
use Psr\Http\Message\ResponseInterface;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class Add
{
    private AddController $controller;
    private JsonResponder $responder;

    public function __construct(AddController $controller, JsonResponder $responder)
    {
        $this->controller = $controller;
        $this->responder = $responder;
    }

    public function __invoke(Request $request, Response $response): ResponseInterface
    {
        try {
            return $this->process($response, $request->getParsedBody());
        } catch (\LogicException $exception) {
            return ($this->responder)($response, ['error' => $exception->getMessage()], 400, 'Bad Request');
        } catch (\Throwable $exception) {
            return ($this->responder)($response, ['error' => $exception->getMessage()], 500, 'Internal Error');
        }
    }

    private function process(ResponseInterface $response, array $data): ResponseInterface
    {
        ($this->controller)($data);

        return ($this->responder)($response);
    }
}
