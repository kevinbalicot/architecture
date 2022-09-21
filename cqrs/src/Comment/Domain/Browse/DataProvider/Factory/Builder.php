<?php

declare(strict_types=1);

namespace App\Comment\Domain\Browse\DataProvider\Factory;

use App\Comment\Domain\Browse\DataProvider\Model\Comment;
use App\Comment\Domain\Browse\DataProvider\Model\CommentInterface;

class Builder
{
    public static function createNew(string $username, string $message): CommentInterface
    {
        return new Comment($username, $message);
    }
}
