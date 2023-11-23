<?php

declare(strict_types=1);

namespace nowready\DemoErp\Exception;

use RuntimeException;
use Throwable;

final class ConfigSettingsNeededException extends RuntimeException
{
    public function __construct(int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct(
            message: 'erpEndpoint, erpSecret, erpVersion config values needed.',
            code: $code,
            previous: $previous
        );
    }
}