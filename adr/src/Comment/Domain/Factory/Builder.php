<?php

declare(strict_types=1);

namespace App\Comment\Domain\Factory;

use App\Comment\Domain\Model\Comment;
use App\Comment\Domain\Model\CommentInterface;

class Builder
{
    public static function createNew(string $username, string $message): CommentInterface
    {
        return new Comment($username, $message);
    }

    public static function createFromData(array $data): CommentInterface
    {
        ['username' => $username, 'message' => $message] = $data;

        return self::createNew($username, $message);
    }
}
