<?php

class Pomodoro {

	private $remaining;
	private $started = false;
	private $startTime;

	public function __construct(
		$remainingSeconds = 1500
	) {
		$this->remaining = $remainingSeconds;
	}

	public function remainingTime(
	) {
		return $this->remaining;
	}

	public function start(
	) {
		$this->started = true;
		$this->startTime = MockTime::time();
	}

	public function isStopped(
	) {
		return !$this->started;
	}

	public function isFinished(
	) {
		$time = MockTime::time();
		return ($this->started)
			&& ($time > $this->startTime + $this->remaining);
	}

}
