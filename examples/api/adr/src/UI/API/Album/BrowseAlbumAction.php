<?php

declare(strict_types=1);

namespace App\UI\API\Album;

use App\Album\Application\Operation\Browse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class BrowseAlbumAction extends AbstractController
{
    public function __construct(
        private readonly Browse $browseAlbumOperator
    ) {}

    #[Route('/api/albums', name: 'app_browse_album_action', methods: ['GET'])]
    public function __invoke(): Response
    {
        $albums = ($this->browseAlbumOperator)();

        return $this->json($albums);
    }
}
