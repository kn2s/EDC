<?php
App::uses('Specialization', 'Model');

/**
 * Specialization Test Case
 */
class SpecializationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.specialization'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Specialization = ClassRegistry::init('Specialization');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Specialization);

		parent::tearDown();
	}

}
