<?php
App::uses('ScheduleDoctor', 'Model');

/**
 * ScheduleDoctor Test Case
 */
class ScheduleDoctorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.schedule_doctor',
		'app.work_schedule'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ScheduleDoctor = ClassRegistry::init('ScheduleDoctor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ScheduleDoctor);

		parent::tearDown();
	}

}
