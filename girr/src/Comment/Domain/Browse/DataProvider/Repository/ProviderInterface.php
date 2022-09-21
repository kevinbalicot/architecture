<?php

declare(strict_types=1);

namespace App\Comment\Domain\Browse\DataProvider\Repository;

use App\Comment\Domain\Browse\DataProvider\Model\CommentInterface;

interface ProviderInterface
{
    /**
     * @return array<CommentInterface>
     */
    public function find(): array;
}
