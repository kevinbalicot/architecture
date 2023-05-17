<?php

namespace App\Controller;

use App\Form\AlbumType;
use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateAlbumAction extends AbstractController
{
    use FormErrorTrait;

    public function __construct(
        private readonly AlbumRepository $albumRepository
    ) {
    }

    #[Route('/api/album', name: 'app_create_album_action', methods: ['POST'])]
    public function __invoke(Request $request): Response
    {
        $form = $this->createForm(AlbumType::class);
        $form->submit($request->toArray());

        if ($form->isValid()) {
            $createdAlbum = $form->getData();
            $this->albumRepository->save($createdAlbum, true);

            return $this->json($createdAlbum);
        }

        return $this->json($this->getErrorsFromForm($form), Response::HTTP_BAD_REQUEST);
    }
}
