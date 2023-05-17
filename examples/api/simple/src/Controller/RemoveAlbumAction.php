<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RemoveAlbumAction extends AbstractController
{
    public function __construct(
        private readonly AlbumRepository $albumRepository
    ) {
    }

    #[Route('/api/album/{id}', name: 'app_remove_album_action', methods: ['DELETE'])]
    public function __invoke(Request $request, int $id): Response
    {
        $album = $this->albumRepository->find($id);
        if (null === $album) {
            throw $this->createNotFoundException(sprintf('Album %s not found', $id));
        }

        $this->albumRepository->remove($album);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}
