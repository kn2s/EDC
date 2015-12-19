<?php
App::uses('WorkSchedule', 'Model');

/**
 * WorkSchedule Test Case
 */
class WorkScheduleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.work_schedule',
		'app.schedule_doctor'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->WorkSchedule = ClassRegistry::init('WorkSchedule');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WorkSchedule);

		parent::tearDown();
	}

}
