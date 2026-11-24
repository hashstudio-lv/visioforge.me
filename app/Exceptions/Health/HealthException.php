<?php

declare(strict_types=1);

namespace App\Exceptions\Health;

use Exception;

class HealthException extends Exception
{
    public static function cpuLoaded(string $message): self
    {
        return new self($message);
    }

    public static function ramLoaded(string $message): self
    {
        return new self($message);
    }
}
