<?php

declare(strict_types=1);

namespace App\Comment\Domain\Add\DataProvider\Repository;

use App\Comment\Domain\Add\DataProvider\Model\CommentInterface;

interface ProviderInterface
{
    public function insert(CommentInterface $comment): void;
}
