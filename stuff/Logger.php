<?php

declare(strict_types=1);

namespace Stuff\Webclient\Extension\Log;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class Logger implements LoggerInterface
{

    /**
     * @var string[]
     */
    private $log = [];

    public function emergency($message, array $context = array())
    {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }

    public function alert($message, array $context = array())
    {
        $this->log(LogLevel::ALERT, $message, $context);
    }

    public function critical($message, array $context = array())
    {
        $this->log(LogLevel::CRITICAL, $message, $context);
    }

    public function error($message, array $context = array())
    {
        $this->log(LogLevel::ERROR, $message, $context);
    }

    public function warning($message, array $context = array())
    {
        $this->log(LogLevel::WARNING, $message, $context);
    }

    public function notice($message, array $context = array())
    {
        $this->log(LogLevel::NOTICE, $message, $context);
    }

    public function info($message, array $context = array())
    {
        $this->log(LogLevel::INFO, $message, $context);
    }

    public function debug($message, array $context = array())
    {
        $this->log(LogLevel::DEBUG, $message, $context);
    }

    public function log($level, $message, array $context = array())
    {
        if (!array_key_exists($level, $this->log)) {
            $this->log[$level] = '';
        }
        $this->log[$level] .= '===' . PHP_EOL . $message . PHP_EOL;
    }

    public function reset(string $level = null)
    {
        if (!$level) {
            $this->log = [];
        }
        $this->log[$level] = '';
    }

    public function get(string $level): string
    {
        return array_key_exists($level, $this->log) ? $this->log[$level] : '';
    }
}