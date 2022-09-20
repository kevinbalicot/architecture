<?php

declare(strict_types=1);

namespace App\Comment\Domain\Model;

interface CommentInterface
{
    public function getUsername(): string;

    public function getMessage(): string;
}
