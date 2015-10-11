<?php
App::uses('Smoking', 'Model');

/**
 * Smoking Test Case
 */
class SmokingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.smoking',
		'app.socialactivity'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Smoking = ClassRegistry::init('Smoking');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Smoking);

		parent::tearDown();
	}

}
