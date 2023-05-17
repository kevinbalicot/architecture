<?php

declare(strict_types=1);

namespace App\UI\API\Album;

use App\Album\Application\Operation\Remove;
use App\Album\Domain\DTO\Id;
use App\Album\Domain\Exception\NotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class RemoveAlbumAction extends AbstractController
{
    public function __construct(
        private readonly Remove $removeAlbumOperator
    ) {
    }

    #[Route('/api/album/{id}', name: 'app_remove_album_action', methods: ['DELETE'])]
    public function __invoke(Request $request, int $id): Response
    {
        try {
            ($this->removeAlbumOperator)(Id::fromData($id));
        } catch (NotFoundException $exception) {
            throw $this->createNotFoundException($exception->getMessage(), $exception);
        }

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}
