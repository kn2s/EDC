<?php
App::uses('Doctor', 'Model');

/**
 * Doctor Test Case
 */
class DoctorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.doctor',
		'app.patient',
		'app.patient_detail',
		'app.country',
		'app.specialization'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Doctor = ClassRegistry::init('Doctor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Doctor);

		parent::tearDown();
	}

}
