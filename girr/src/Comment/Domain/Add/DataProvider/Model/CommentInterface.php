<?php

declare(strict_types=1);

namespace App\Comment\Domain\Add\DataProvider\Model;

interface CommentInterface
{
    public function toArray(): array;
}
