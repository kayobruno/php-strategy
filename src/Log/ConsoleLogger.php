<?php

declare(strict_types = 1);

namespace App\Log;

use App\Log\Contract\LogWriter;

class ConsoleLogger implements LogWriter
{
    public function warning(string $message): void
    {
        echo $message;
    }

    public function error(string $message): void
    {
        echo $message;
    }
}
