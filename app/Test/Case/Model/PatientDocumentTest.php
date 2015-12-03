<?php
App::uses('PatientDocument', 'Model');

/**
 * PatientDocument Test Case
 */
class PatientDocumentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.patient_document',
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
		$this->PatientDocument = ClassRegistry::init('PatientDocument');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PatientDocument);

		parent::tearDown();
	}

}
