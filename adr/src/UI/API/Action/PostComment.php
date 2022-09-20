<?php

declare(strict_types=1);

namespace App\UI\API\Action;

use App\Shared\Infrastructure\Comment\Manage;
use App\UI\Shared\Responder\JsonResponder;
use Psr\Http\Message\ResponseInterface;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class PostComment
{
    private Manage $manager;
    private JsonResponder $responder;

    public function __construct(Manage $manager, JsonResponder $responder)
    {
        $this->manager = $manager;
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
        return ($this->responder)($response, $this->manager->insert($data));
    }
}
