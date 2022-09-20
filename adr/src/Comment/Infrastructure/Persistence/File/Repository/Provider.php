<?php

declare(strict_types=1);

namespace App\Comment\Infrastructure\Persistence\File\Repository;

use App\Comment\Domain\Factory\Builder;
use App\Comment\Domain\Model\CommentInterface;
use App\Comment\Domain\Repository\ProviderInterface;
use App\Shared\Infrastructure\Comment\Manage;

class Provider implements ProviderInterface
{
    private Manage $manager;

    public function __construct(Manage $manager)
    {
        $this->manager = $manager;
    }

    public function find(): array
    {
        return array_map(static function (array $data) {
            ['username' => $username, 'message' => $message] = $data;

            return Builder::createNew($username, $message);
        }, $this->manager->all());
    }

    public function insert(CommentInterface $comment): void
    {
        $this->manager->insert(['username' => $comment->getUsername(), 'message' => $comment->getMessage()]);
    }
}
