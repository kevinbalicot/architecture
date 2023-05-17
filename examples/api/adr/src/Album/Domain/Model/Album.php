<?php

declare(strict_types=1);

namespace App\Album\Domain\Model;

interface Album
{
    public function getTitle(): string;

    public function setTitle(string $title): self;

    public function getAuthor(): string;

    public function setAuthor(string $author): self;
}
