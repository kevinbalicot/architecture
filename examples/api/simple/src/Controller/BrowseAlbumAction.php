<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BrowseAlbumAction extends AbstractController
{
    public function __construct(
        private readonly AlbumRepository $albumRepository
    ) {}

    #[Route('/api/albums', name: 'app_browse_album_action', methods: ['GET'])]
    public function __invoke(): Response
    {
        $albums = $this->albumRepository->findAll();

        return $this->json($albums);
    }
}
