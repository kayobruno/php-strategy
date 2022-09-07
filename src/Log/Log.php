<?php

namespace App\Log;

class Log
{
    /** @throws \Exception */
    public function __construct(private string $type)
    {
        if (!in_array($this->type, ['console', 'file'])) {
            throw new \Exception('Invalid type!');
        }
    }

    public function error(string $message): void
    {
        $message = "Log Error: {$message}" . PHP_EOL;
        if ($this->type === 'console') {
            echo $message;
        }

        if ($this->type === 'file') {
            file_put_contents('logs.txt', $message);
        }
    }

    public function warning(string $message): void
    {
        $message = "Log Warning: {$message}" . PHP_EOL;
        if ($this->type === 'console') {
            echo $message;
        }

        if ($this->type === 'file') {
            file_put_contents('logs.txt', $message);
        }
    }
}
