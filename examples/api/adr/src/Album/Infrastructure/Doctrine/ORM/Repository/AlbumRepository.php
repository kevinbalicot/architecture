<?php

namespace App\Album\Infrastructure\Doctrine\ORM\Repository;

use App\Album\Domain\Model\Album;
use App\Album\Domain\Persister;
use App\Album\Domain\Provider;
use App\Album\Infrastructure\Doctrine\ORM\Entity\Album as AlbumEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AlbumRepository extends ServiceEntityRepository implements Persister, Provider
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlbumEntity::class);
    }

    public function save(Album $album, bool $flush = false): void
    {
        $this->getEntityManager()->persist($album);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Album $album, bool $flush = false): void
    {
        $this->getEntityManager()->remove($album);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getById(int $id): ?Album
    {
        return $this->find($id);
    }

    public function getAll(): array
    {
        return $this->findAll();
    }
}
