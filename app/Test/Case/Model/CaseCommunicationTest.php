<?php
App::uses('CaseCommunication', 'Model');

/**
 * CaseCommunication Test Case
 */
class CaseCommunicationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.case_communication',
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
		$this->CaseCommunication = ClassRegistry::init('CaseCommunication');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CaseCommunication);

		parent::tearDown();
	}

}
