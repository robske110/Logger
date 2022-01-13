<?php
declare(strict_types=1);

namespace robske_110\Logger;

use Psr\Log\LoggerInterface;

class PSRLogger implements LoggerInterface{
	
	public function emergency($message, array $context = array()): void{
		$this->log("emergency", $message);
	}
	
	public function alert($message, array $context = array()): void{
		$this->log("alert", $message);
	}
	
	public function critical($message, array $context = array()): void{
		$this->log("critical", $message);
	}
	
	public function error($message, array $context = array()): void{
		$this->log("error", $message);
	}
	
	public function warning($message, array $context = array()): void{
		$this->log("warning", $message);
	}
	
	public function notice($message, array $context = array()): void{
		$this->log("notice", $message);
	}
	
	public function info($message, array $context = array()): void{
		$this->log("info", $message);
	}
	
	public function debug($message, array $context = array()): void{
		$this->log("debug", $message);
	}
	
	public function log($level, $message, array $context = array()): void{
		$level = match($level){
			"emergency", "alert" => Logger::LOG_LVL_EMERGENCY,
			"critical", "error" => Logger::LOG_LVL_CRITICAL,
			"warning" => Logger::LOG_LVL_WARNING,
			"notice" => Logger::LOG_LVL_NOTICE,
			"info" => Logger::LOG_LVL_INFO,
			"debug" => Logger::LOG_LVL_DEBUG,
			default => Logger::LOG_LVL_NOTICE,
		};
		Logger::log($message, $level);
	}
}