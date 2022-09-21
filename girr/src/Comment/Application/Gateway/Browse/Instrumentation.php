<?php

declare(strict_types=1);

namespace App\Comment\Application\Gateway\Browse;

use App\Shared\Application\Gateway\Instrumentation\AbstractInstrumentation;

final class Instrumentation extends AbstractInstrumentation
{
    public const NAME = 'comment.browse';
}
