<?php
App::uses('DoctorCase', 'Model');

/**
 * DoctorCase Test Case
 */
class DoctorCaseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.doctor_case',
		'app.patient',
		'app.patient_detail',
		'app.country',
		'app.doctor',
		'app.specialization'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DoctorCase = ClassRegistry::init('DoctorCase');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DoctorCase);

		parent::tearDown();
	}

}
