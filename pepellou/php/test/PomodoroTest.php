<?php

require_once 'src/Pomodoro.php';
require_once 'test/MockTime.php';

class PomodoroTest extends PHPUnit_Framework_TestCase {

	private $defaultPomodoro;

	public function setUp(
	) {
		$this->defaultPomodoro = new Pomodoro();
	}

	public function test_un_pomodoro_dura_25_minutos_por_defecto(
	) {
		$_25min = 25 * 60;

		$this->assertEquals($_25min, $this->defaultPomodoro->remainingTime());
	}

	public function test_puedo_crear_un_pomodoro_con_cualquier_duracion(
	) {
		$newDuration = 15 * 60;
		$aPomodoro = new Pomodoro($newDuration);

		$this->assertEquals($newDuration, $aPomodoro->remainingTime());
	}

	public function test_un_pomodoro_recien_creado_esta_parado(
	) {
		$this->assertTrue($this->defaultPomodoro->isStopped());
	}

	public function test_al_arrancar_un_pomodoro_comienza_la_cuenta_atras(
	) {
		$this->defaultPomodoro->start();

		$this->assertFalse($this->defaultPomodoro->isStopped());
	}

	public function test_un_pomodoro_no_termina_si_no_ha_sido_arrancado_previamente(
	) {
		$timeToElapse = 1;
		$aQuickPomodoro = new Pomodoro($timeToElapse);

		MockTime::sleep($timeToElapse + 1);
		
		$this->assertFalse($aQuickPomodoro->isFinished());
	}

	public function test_un_pomodoro_acaba_cuando_se_agota_su_tiempo(
	) {
		$timeToElapse = 1;
		$aQuickPomodoro = new Pomodoro($timeToElapse);

		$aQuickPomodoro->start();
		MockTime::sleep($timeToElapse + 1);
		
		$this->assertTrue($aQuickPomodoro->isFinished());
	}

	public function test_un_pomodoro_no_acaba_mientras_no_se_agote_su_tiempo(
	) {
		$timeToElapse = 10;
		$aQuickPomodoro = new Pomodoro($timeToElapse);

		$aQuickPomodoro->start();
		MockTime::sleep($timeToElapse - 1);
		
		$this->assertFalse($aQuickPomodoro->isFinished());
	}

	public function test_un_pomodoro_se_inicia_sin_interrupciones(
	) {
	}

	public function test_si_no_esta_arrancado_no_se_puede_interrumpir(
	) {
	}

	public function test_el_pomodoro_cuenta_las_interrupciones(
	) {
	}

	public function test_un_pomodoro_ya_arrancado_se_reinicia_al_arrancarlo_de_nuevo(
	) {
	}

	public function test_un_pomodoro_se_reinicia_sin_interrupciones(
	) {
	}

}
