<?php
App::uses('DoctorSpecializetion', 'Model');

/**
 * DoctorSpecializetion Test Case
 */
class DoctorSpecializetionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.doctor_specializetion',
		'app.specialization'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DoctorSpecializetion = ClassRegistry::init('DoctorSpecializetion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DoctorSpecializetion);

		parent::tearDown();
	}

}
