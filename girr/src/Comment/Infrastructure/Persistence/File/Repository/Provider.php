<?php

declare(strict_types=1);

namespace App\Comment\Infrastructure\Persistence\File\Repository;

use App\Comment\Domain\Browse\DataProvider\Factory\Builder;
use App\Comment\Domain\Browse\DataProvider\Repository\ProviderInterface as BrowseProviderInterface;
use App\Comment\Domain\Add\DataProvider\Repository\ProviderInterface as AddProviderInterface;
use App\Comment\Domain\Add\DataProvider\Model\CommentInterface;
use App\Shared\Infrastructure\Comment\Manage;

class Provider implements BrowseProviderInterface, AddProviderInterface
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
        $this->manager->insert($comment->toArray());
    }
}
