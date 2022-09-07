<?php

namespace App\Log;

use App\Log\Contract\LogWriter;

class Log
{
    public function __construct(private LogWriter $logWriter)
    { }

    public function error(string $message): void
    {
        $this->logWriter->error($message);
    }

    public function warning(string $message): void
    {
        $this->logWriter->warning($message);
    }
}
