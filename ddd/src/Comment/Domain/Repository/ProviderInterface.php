<?php

declare(strict_types=1);

namespace App\Comment\Domain\Repository;

use App\Comment\Domain\Model\CommentInterface;

interface ProviderInterface
{
    /**
     * @return array<CommentInterface>
     */
    public function find(): array;

    public function insert(CommentInterface $comment): void;
}
