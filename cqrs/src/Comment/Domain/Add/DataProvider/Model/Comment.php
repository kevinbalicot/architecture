<?php

declare(strict_types=1);

namespace App\Comment\Domain\Add\DataProvider\Model;

class Comment implements CommentInterface
{
    private string $username;
    private string $message;

    public function __construct(string $username, string $message)
    {
        $this->username = $username;
        $this->message = $message;
    }

    public function toArray(): array
    {
        return [
            'username' => $this->username,
            'message' => $this->message,
        ];
    }
}
