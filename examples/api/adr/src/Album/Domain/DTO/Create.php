<?php

declare(strict_types=1);

namespace App\Album\Domain\DTO;

use Webmozart\Assert\Assert;

final class Create
{
    public function __construct(
        public string $title,
        public string $author,
    ) {
    }

    static public function fromData(array $data): self
    {
        Assert::keyExists($data, 'title');
        Assert::keyExists($data, 'author');

        return new self($data['title'], $data['author']);
    }
}
