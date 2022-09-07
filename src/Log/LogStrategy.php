<?php

declare(strict_types = 1);

namespace App\Log;

use App\Log\Contract\LogWriter;

class LogStrategy implements LogWriter
{
    public function __construct(private LogWriter $logWriter)
    { }

    public function warning(string $message): void
    {
        $message = "Log Warning: {$message}" . PHP_EOL;
        $this->logWriter->warning($message);
    }

    public function error(string $message): void
    {
        $message = "Log Error: {$message}" . PHP_EOL;
        $this->logWriter->error($message);
    }
}
