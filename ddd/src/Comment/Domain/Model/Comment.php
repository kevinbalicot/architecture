<?php

declare(strict_types=1);

namespace App\Comment\Domain\Model;

class Comment implements CommentInterface
{
    private string $username;
    private string $message;

    public function __construct(string $username, string $message)
    {
        $this->username = $username;
        $this->message = $message;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
