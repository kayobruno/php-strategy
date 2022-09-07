<?php

declare(strict_types = 1);

namespace Tests\Log;

use App\Log\Log;
use PHPUnit\Framework\TestCase;

class LogTest extends TestCase
{
    private Log $consoleLog;
    private Log $fileLog;

    public function setUp(): void
    {
        $this->consoleLog = new Log('console');
        $this->fileLog = new Log('file');
    }

    public function tearDown(): void
    {
        chdir(__DIR__);
        $filename = './logs.txt';
        if (file_exists($filename)) {
            unlink($filename);
        }
    }

    /** @test */
    public function logShouldThrowExceptionWhenTypeIsInvalid(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid type!');

        new Log('foo');
    }

    /** @test */
    public function consoleLogShouldPrintErrorLog(): void
    {
        $this->consoleLog->error('Test message');
        $this->expectOutputString('Log Error: Test message' . PHP_EOL);
    }

    /** @test */
    public function consoleLogShouldPrintWarningLog(): void
    {
        $this->consoleLog->warning('Test message');
        $this->expectOutputString('Log Warning: Test message' . PHP_EOL);
    }

    /** @test */
    public function fileLogShouldCreateFile(): void
    {
        chdir(__DIR__);

        $this->fileLog->error('Test message');
        $this->assertFileExists('./logs.txt');
    }

    /** @test */
    public function fileLogShouldCreateFileWithCorrectLog(): void
    {
        chdir(__DIR__);

        $this->fileLog->error('Test message');

        $this->assertFileEquals('../fixtures/logs.txt', './logs.txt');
    }
}
