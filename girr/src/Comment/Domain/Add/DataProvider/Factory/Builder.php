<?php

declare(strict_types=1);

namespace App\Comment\Domain\Add\DataProvider\Factory;

use App\Comment\Domain\Add\DataProvider\Model\Comment;
use App\Comment\Domain\Add\DataProvider\Model\CommentInterface;

class Builder
{
    public static function createNew(string $username, string $message): CommentInterface
    {
        return new Comment($username, $message);
    }
}
