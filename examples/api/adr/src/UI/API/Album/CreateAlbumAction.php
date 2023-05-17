<?php

namespace App\UI\API\Album;

use App\Album\Application\Operation\Add;
use App\Album\Domain\DTO\Create as CreateDTO;
use App\UI\Form\AlbumType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class CreateAlbumAction extends AbstractController
{
    use FormErrorTrait;

    public function __construct(
        private readonly Add $addAlbumOperator
    ) {
    }

    #[Route('/api/album', name: 'app_create_album_action', methods: ['POST'])]
    public function __invoke(Request $request): Response
    {
        $form = $this->createForm(AlbumType::class);
        $form->submit($request->toArray());

        if (!$form->isValid()) {
            return $this->json($this->getErrorsFromForm($form), Response::HTTP_BAD_REQUEST);
        }

        return $this->json(
            ($this->addAlbumOperator)(CreateDTO::fromData($form->getData()))
        );
    }
}
