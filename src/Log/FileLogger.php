<?php

declare(strict_types = 1);

namespace App\Log;

use App\Log\Contract\LogWriter;

class FileLogger implements LogWriter
{
    public function __construct(private string $filename)
    { }

    public function warning(string $message): void
    {
        $this->saveLogMessageInFile($message);
    }

    public function error(string $message): void
    {
        $this->saveLogMessageInFile($message);
    }

    private function saveLogMessageInFile(string $message)
    {
        file_put_contents($this->filename, $message);
    }
}
