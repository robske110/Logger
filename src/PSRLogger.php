<?php
declare(strict_types=1);

namespace robske_110\Logger;

use Psr\Log\InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class PSRLogger implements LoggerInterface{
	
	public function emergency($message, array $context = []): void{
		$this->log("emergency", $message);
	}
	
	public function alert($message, array $context = []): void{
		$this->log("alert", $message);
	}
	
	public function critical($message, array $context = []): void{
		$this->log("critical", $message);
	}
	
	public function error($message, array $context = []): void{
		$this->log("error", $message);
	}
	
	public function warning($message, array $context = []): void{
		$this->log("warning", $message);
	}
	
	public function notice($message, array $context = []): void{
		$this->log("notice", $message);
	}
	
	public function info($message, array $context = []): void{
		$this->log("info", $message);
	}
	
	public function debug($message, array $context = []): void{
		$this->log("debug", $message);
	}
	
	public function log($level, $message, array $context = []): void{
		$level = match($level){
			LogLevel::EMERGENCY, LogLevel::ALERT => Logger::LOG_LVL_EMERGENCY,
			LogLevel::CRITICAL, LOgLevel::ERROR => Logger::LOG_LVL_CRITICAL,
			LogLevel::WARNING => Logger::LOG_LVL_WARNING,
			LogLevel::NOTICE => Logger::LOG_LVL_NOTICE,
			LogLevel::INFO => Logger::LOG_LVL_INFO,
			LogLevel::DEBUG => Logger::LOG_LVL_DEBUG,
			default => throw new InvalidArgumentException,
		};
		Logger::log((string) $message, $level);
	}
}