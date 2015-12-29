<?php
App::uses('CommonHoliday', 'Model');

/**
 * CommonHoliday Test Case
 */
class CommonHolidayTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.common_holiday'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CommonHoliday = ClassRegistry::init('CommonHoliday');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CommonHoliday);

		parent::tearDown();
	}

}
