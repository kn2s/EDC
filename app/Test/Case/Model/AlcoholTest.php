<?php
App::uses('Alcohol', 'Model');

/**
 * Alcohol Test Case
 */
class AlcoholTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.alcohol',
		'app.socialactivity'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Alcohol = ClassRegistry::init('Alcohol');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Alcohol);

		parent::tearDown();
	}

}
