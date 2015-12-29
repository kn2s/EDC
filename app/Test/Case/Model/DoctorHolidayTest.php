<?php
App::uses('DoctorHoliday', 'Model');

/**
 * DoctorHoliday Test Case
 */
class DoctorHolidayTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.doctor_holiday'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DoctorHoliday = ClassRegistry::init('DoctorHoliday');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DoctorHoliday);

		parent::tearDown();
	}

}
