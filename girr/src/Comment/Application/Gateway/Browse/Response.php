<?php

declare(strict_types=1);

namespace App\Comment\Application\Gateway\Browse;

use App\Comment\Domain\Browse\DataProvider\Model\CommentInterface;
use App\Shared\Application\Gateway\GatewayResponseInterface;

final class Response implements GatewayResponseInterface
{
    private array $data;

    /**
     * @param CommentInterface[] $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return CommentInterface[]
     */
    public function getData(): array
    {
        return $this->data;
    }
}
