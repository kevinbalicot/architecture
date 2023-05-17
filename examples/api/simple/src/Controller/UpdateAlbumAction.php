<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\AlbumType;
use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateAlbumAction extends AbstractController
{
    use FormErrorTrait;

    public function __construct(
        private readonly AlbumRepository $albumRepository
    ) {
    }

    #[Route('/api/album/{id}', name: 'app_update_album_action', methods: ['POST'])]
    public function __invoke(Request $request, int $id): Response
    {
        $album = $this->albumRepository->find($id);
        if (null === $album) {
            throw $this->createNotFoundException(sprintf('Album %s not found', $id));
        }

        $form = $this->createForm(AlbumType::class, $album);
        $form->submit($request->toArray());

        if ($form->isValid()) {
            $updatedAlbum = $form->getData();
            $this->albumRepository->save($updatedAlbum, true);

            return $this->json($updatedAlbum);
        }

        return $this->json($this->getErrorsFromForm($form), Response::HTTP_BAD_REQUEST);
    }
}
