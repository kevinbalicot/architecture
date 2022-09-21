<?php

declare(strict_types=1);

namespace App\Comment\Application\Gateway\Add;

use App\Shared\Application\Gateway\GatewayRequestInterface;

final class Request implements GatewayRequestInterface
{
    private string $username;
    private string $message;

    public function __construct(string $username, string $message)
    {
        $this->username = $username;
        $this->message = $message;
    }

    public static function createFromData(array $data): self
    {
        ['username' => $username, 'message' => $message] = $data;

        return new self($username, $message);
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getData(): array
    {
        return [
            'username' => $this->username,
            'message' => $this->message,
        ];
    }
}
