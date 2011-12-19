<?php

class MockTime {

	private static $time = 0;
	
	public static function time(
	) {
		return self::$time;
	}

	public static function sleep(
		$seconds
	) {
		self::$time += $seconds;
	}

}
