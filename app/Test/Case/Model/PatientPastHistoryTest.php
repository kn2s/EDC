<?php
App::uses('PatientPastHistory', 'Model');

/**
 * PatientPastHistory Test Case
 */
class PatientPastHistoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.patient_past_history',
		'app.patient',
		'app.patient_detail',
		'app.country'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PatientPastHistory = ClassRegistry::init('PatientPastHistory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PatientPastHistory);

		parent::tearDown();
	}

}
