<?php
App::uses('PatientDetail', 'Model');

/**
 * PatientDetail Test Case
 */
class PatientDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.patient_detail',
		'app.patient',
		'app.country'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PatientDetail = ClassRegistry::init('PatientDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PatientDetail);

		parent::tearDown();
	}

}
