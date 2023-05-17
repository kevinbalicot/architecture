<?php

declare(strict_types=1);

namespace App\UI\API\Album;

use App\Album\Application\Operation\Update;
use App\Album\Domain\DTO\Edit as EditDTO;
use App\Album\Domain\Exception\NotFoundException;
use App\UI\Form\AlbumType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class UpdateAlbumAction extends AbstractController
{
    use FormErrorTrait;

    public function __construct(
        private readonly Update $updateAlbumOperator
    ) {
    }

    #[Route('/api/album/{id}', name: 'app_update_album_action', methods: ['POST'])]
    public function __invoke(Request $request, int $id): Response
    {
        $form = $this->createForm(AlbumType::class);
        $form->submit($request->toArray());

        if (!$form->isValid()) {
            return $this->json($this->getErrorsFromForm($form), Response::HTTP_BAD_REQUEST);
        }

        try {
            return $this->json(
                ($this->updateAlbumOperator)(EditDTO::fromData($id, $form->getData()))
            );
        } catch (NotFoundException $exception) {
            throw $this->createNotFoundException($exception->getMessage(), $exception);
        }
    }
}
