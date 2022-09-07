<?php

declare(strict_types = 1);

namespace App\Log\Contract;

interface LogWriter
{
    public function warning(string $message): void;

    public function error(string $message): void;
}
