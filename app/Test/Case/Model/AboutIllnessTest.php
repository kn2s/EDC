<?php
App::uses('AboutIllness', 'Model');

/**
 * AboutIllness Test Case
 */
class AboutIllnessTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.about_illness',
		'app.patient',
		'app.patient_detail',
		'app.country',
		'app.principle_diagonisises'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AboutIllness = ClassRegistry::init('AboutIllness');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AboutIllness);

		parent::tearDown();
	}

}
